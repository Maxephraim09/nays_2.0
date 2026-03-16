<?php
/**
 * Database Connection Test Script
 * Access: http://localhost:8000/test-db.php
 * DELETE AFTER TESTING!
 */

require_once __DIR__ . '/../bootstrap/app.php';

use App\Core\Database;

echo "<h1>NAYS 2.0 - Database Connection Test</h1>";

try {
    $db = Database::getInstance();
    
    // Test query
    $result = $db->query("SELECT 1 as test")->single();
    
    if ($result->test == 1) {
        echo "<p style='color: green; font-weight: bold;'>✓ Database connection successful!</p>";
        
        // Get database info
        $version = $db->query("SELECT VERSION() as version")->single();
        echo "<p>MySQL Version: " . $version->version . "</p>";
        
        // Check if database exists
        $dbName = $_ENV['DB_DATABASE'];
        $dbExists = $db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$dbName])->single();
        
        if ($dbExists) {
            echo "<p style='color: green;'>✓ Database '{$dbName}' exists</p>";
            
            // Count tables
            $tables = $db->query("SELECT COUNT(*) as count FROM information_schema.tables WHERE table_schema = ?", [$dbName])->single();
            echo "<p>Number of tables: " . $tables->count . "</p>";
            
        } else {
            echo "<p style='color: orange;'>⚠ Database '{$dbName}' does not exist yet. Run migrations.</p>";
        }
    }
    
} catch (Exception $e) {
    echo "<p style='color: red; font-weight: bold;'>✗ Database connection failed!</p>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    echo "<h3>Troubleshooting Tips:</h3>";
    echo "<ul>";
    echo "<li>Check if MySQL is running</li>";
    echo "<li>Verify DB_HOST and DB_PORT in .env</li>";
    echo "<li>Check DB_USERNAME and DB_PASSWORD</li>";
    echo "<li>Ensure database '{$_ENV['DB_DATABASE']}' exists</li>";
    echo "</ul>";
}

// Show current .env values (excluding passwords)
echo "<h3>Current Configuration:</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Key</th><th>Value</th></tr>";
$keys = ['APP_ENV', 'APP_DEBUG', 'APP_URL', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME'];
foreach ($keys as $key) {
    $value = $_ENV[$key] ?? 'not set';
    echo "<tr><td>$key</td><td>" . htmlspecialchars($value) . "</td></tr>";
}
echo "</table>";

echo "<p><strong>Note:</strong> Delete this file after testing!</p>";