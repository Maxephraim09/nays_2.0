<?php
namespace App\Core;

use PDO;

class Model {
    protected $db;
    protected $table;
    protected $primaryKey = 'id';
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function all() {
        return $this->db->query("SELECT * FROM {$this->table}")->resultSet();
    }
    
    public function find($id) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id")
                        ->bind(':id', $id)
                        ->single();
    }
    
    public function where($conditions = [], $operator = 'AND') {
        $sql = "SELECT * FROM {$this->table} WHERE ";
        $values = [];
        
        foreach ($conditions as $key => $value) {
            $conditions[] = "{$key} = :{$key}";
            $values[":{$key}"] = $value;
        }
        
        $sql .= implode(" {$operator} ", $conditions);
        
        $query = $this->db->query($sql);
        foreach ($values as $key => $value) {
            $query->bind($key, $value);
        }
        
        return $query->resultSet();
    }
    
    public function first($conditions = []) {
        $result = $this->where($conditions);
        return !empty($result) ? $result[0] : null;
    }
    
    public function create($data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
        
        $query = $this->db->query($sql);
        foreach ($data as $key => $value) {
            $query->bind(":{$key}", $value);
        }
        
        if ($query->execute()) {
            return $this->db->lastInsertId();
        }
        
        return false;
    }
    
    public function update($id, $data) {
        $set = [];
        foreach (array_keys($data) as $key) {
            $set[] = "{$key} = :{$key}";
        }
        $set = implode(', ', $set);
        
        $sql = "UPDATE {$this->table} SET {$set} WHERE {$this->primaryKey} = :id";
        
        $query = $this->db->query($sql);
        $query->bind(':id', $id);
        foreach ($data as $key => $value) {
            $query->bind(":{$key}", $value);
        }
        
        return $query->execute();
    }
    
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
        return $this->db->query($sql)->bind(':id', $id)->execute();
    }
    
    public function count() {
        $result = $this->db->query("SELECT COUNT(*) as count FROM {$this->table}")->single();
        return $result->count;
    }
    
    public function paginate($page = 1, $perPage = 20) {
        $offset = ($page - 1) * $perPage;
        
        $total = $this->count();
        $data = $this->db->query("SELECT * FROM {$this->table} LIMIT {$offset}, {$perPage}")->resultSet();
        
        return [
            'data' => $data,
            'current_page' => $page,
            'per_page' => $perPage,
            'total' => $total,
            'last_page' => ceil($total / $perPage)
        ];
    }
    
    public function query($sql) {
        return $this->db->query($sql);
    }
}