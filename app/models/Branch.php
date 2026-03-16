<?php
namespace App\Models;

use App\Core\Model;

class Branch extends Model {
    protected $table = 'branches';
    
    /**
     * Get all branches by type
     */
    public function getByType($type) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE type = :type AND is_active = 1")
                        ->bind(':type', $type)
                        ->resultSet();
    }
    
    /**
     * Find or create branch
     */
    public function findOrCreate($name, $type, $location = null, $institution = null) {
        // Try to find existing branch
        $branch = $this->db->query("SELECT * FROM {$this->table} WHERE name LIKE :name AND type = :type LIMIT 1")
                           ->bind(':name', '%' . $name . '%')
                           ->bind(':type', $type)
                           ->single();
        
        if ($branch) {
            return $branch->id;
        }
        
        // Create new branch
        $id = $this->generateUUID();
        $code = strtoupper(substr(preg_replace('/[^a-zA-Z0-9]/', '', $name), 0, 10)) . '-' . strtoupper(substr($type, 0, 3));
        
        $sql = "INSERT INTO branches (id, name, code, type, location, institution_name, is_active) 
                VALUES (:id, :name, :code, :type, :location, :institution, 1)";
        
        $result = $this->db->query($sql)
                           ->bind(':id', $id)
                           ->bind(':name', $name)
                           ->bind(':code', $code)
                           ->bind(':type', $type)
                           ->bind(':location', $location)
                           ->bind(':institution', $institution)
                           ->execute();
        
        return $result ? $id : false;
    }
    
    /**
     * Generate UUID
     */
    private function generateUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}