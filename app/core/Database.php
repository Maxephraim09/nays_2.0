<?php
namespace App\Core;

use PDO;
use PDOException;
use Exception;

class Database {
    private static $instance = null;
    private $connection;
    private $statement;
    private $error;
    private $queryCount = 0;
    private $queries = [];
    
    private function __construct() {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            // Add MySQL-specific options only if extension is loaded
            if (defined('PDO::MYSQL_ATTR_INIT_COMMAND')) {
                $options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci";
            }
            
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
            
            // Set timezone for connection
            $this->connection->exec("SET time_zone = '" . date('P') . "'");
            
        } catch (PDOException $e) {
            $this->logError("Database connection failed: " . $e->getMessage());
            
            if (APP_DEBUG) {
                die('Database connection failed: ' . $e->getMessage());
            } else {
                die('Database connection failed. Please try again later.');
            }
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Prepare a SQL query
     */
    public function query($sql) {
        $this->statement = $this->connection->prepare($sql);
        $this->queries[] = $sql;
        $this->queryCount++;
        
        if (APP_DEBUG) {
            error_log("SQL Query: " . $sql);
        }
        
        return $this;
    }
    
    /**
     * Bind a value to a parameter
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        
        try {
            $this->statement->bindValue($param, $value, $type);
        } catch (PDOException $e) {
            $this->logError("Binding error for param {$param}: " . $e->getMessage());
            throw new Exception("Database binding error: " . $e->getMessage());
        }
        
        return $this;
    }
    
    /**
     * Bind multiple values at once
     */
    public function bindMultiple($params) {
        foreach ($params as $param => $value) {
            $this->bind($param, $value);
        }
        return $this;
    }
    
    /**
     * Execute the prepared statement
     */
    public function execute() {
        try {
            $result = $this->statement->execute();
            
            if (APP_DEBUG) {
                error_log("Query executed successfully. Affected rows: " . $this->statement->rowCount());
            }
            
            return $result;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            $this->logError("Execution error: " . $e->getMessage());
            
            if (APP_DEBUG) {
                throw new Exception("Database error: " . $e->getMessage());
            }
            
            return false;
        }
    }
    
    /**
     * Get result set as array of objects
     */
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll();
    }
    
    /**
     * Get single record as object
     */
    public function single() {
        $this->execute();
        return $this->statement->fetch();
    }
    
    /**
     * Get single record as associative array
     */
    public function singleAssoc() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get result set as associative array
     */
    public function resultSetAssoc() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get row count
     */
    public function rowCount() {
        return $this->statement->rowCount();
    }
    
    /**
     * Get last insert ID
     */
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
    
    /**
     * Begin transaction
     */
    public function beginTransaction() {
        return $this->connection->beginTransaction();
    }
    
    /**
     * Commit transaction
     */
    public function commit() {
        return $this->connection->commit();
    }
    
    /**
     * Rollback transaction
     */
    public function rollback() {
        return $this->connection->rollBack();
    }
    
    /**
     * Check if in transaction
     */
    public function inTransaction() {
        return $this->connection->inTransaction();
    }
    
    /**
     * Get error message
     */
    public function getError() {
        return $this->error;
    }
    
    /**
     * Get PDO error info
     */
    public function errorInfo() {
        return $this->statement->errorInfo();
    }
    
    /**
     * Get query count
     */
    public function getQueryCount() {
        return $this->queryCount;
    }
    
    /**
     * Get all queries executed
     */
    public function getQueries() {
        return $this->queries;
    }
    
    /**
     * Log error
     */
    private function logError($message) {
        $log = date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL;
        $log .= "Trace: " . debug_backtrace()[1]['function'] . " in " . debug_backtrace()[0]['file'] . " line " . debug_backtrace()[0]['line'] . PHP_EOL;
        
        $logDir = dirname(dirname(__DIR__)) . '/storage/logs';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        file_put_contents($logDir . '/db_error.log', $log, FILE_APPEND);
    }
    
    /**
     * Get table columns
     */
    public function getColumns($table) {
        return $this->query("SHOW COLUMNS FROM {$table}")
                    ->resultSet();
    }
    
    /**
     * Check if table exists
     */
    public function tableExists($table) {
        $result = $this->query("SHOW TABLES LIKE :table")
                       ->bind(':table', $table)
                       ->single();
        return !empty($result);
    }
    
    /**
     * Escape string (use prepared statements instead!)
     */
    public function escape($string) {
        return $this->connection->quote($string);
    }
    
    /**
     * Get PDO connection (for advanced usage)
     */
    public function getConnection() {
        return $this->connection;
    }
    
    /**
     * Insert and get ID
     */
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        
        $this->query($sql);
        
        foreach ($data as $key => $value) {
            $this->bind(":{$key}", $value);
        }
        
        if ($this->execute()) {
            return $this->lastInsertId();
        }
        
        return false;
    }
    
    /**
     * Update table
     */
    public function update($table, $data, $where, $whereParams = []) {
        $set = [];
        foreach (array_keys($data) as $key) {
            $set[] = "{$key} = :set_{$key}";
        }
        $set = implode(', ', $set);
        
        $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
        
        $this->query($sql);
        
        foreach ($data as $key => $value) {
            $this->bind(":set_{$key}", $value);
        }
        
        foreach ($whereParams as $key => $value) {
            $this->bind($key, $value);
        }
        
        return $this->execute();
    }
    
    /**
     * Delete from table
     */
    public function delete($table, $where, $params = []) {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        
        $this->query($sql);
        
        foreach ($params as $key => $value) {
            $this->bind($key, $value);
        }
        
        return $this->execute();
    }
    
    /**
     * Get single value
     */
    public function getValue($sql, $params = []) {
        $this->query($sql);
        
        foreach ($params as $key => $value) {
            $this->bind($key, $value);
        }
        
        $result = $this->single();
        if ($result) {
            $array = (array) $result;
            return reset($array);
        }
        
        return null;
    }
    
    /**
     * Get column
     */
    public function getColumn($sql, $params = []) {
        $this->query($sql);
        
        foreach ($params as $key => $value) {
            $this->bind($key, $value);
        }
        
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_COLUMN);
    }
    
    /**
     * Get key-value pairs
     */
    public function getPairs($sql, $params = []) {
        $this->query($sql);
        
        foreach ($params as $key => $value) {
            $this->bind($key, $value);
        }
        
        $this->execute();
        $results = $this->statement->fetchAll(PDO::FETCH_NUM);
        
        $pairs = [];
        foreach ($results as $row) {
            $pairs[$row[0]] = $row[1];
        }
        
        return $pairs;
    }
    
    private function __clone() {}
    
    public function __destruct() {
        $this->statement = null;
    }
}