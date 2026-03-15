<?php
namespace App\Models;

use App\Core\Model;

class Announcement extends Model
{
    protected $table = 'announcements';
    protected $fillable = [
        'title', 'content', 'priority', 'target_branch_id',
        'created_by', 'expires_at', 'is_active'
    ];

    public function getRecent($limit = 5)
    {
        $sql = "SELECT * FROM {$this->table} 
                WHERE is_active = 1 
                AND (expires_at IS NULL OR expires_at > NOW())
                ORDER BY created_at DESC 
                LIMIT ?";
        return $this->db->query($sql)->bind(1, $limit)->resultSet();
    }
}