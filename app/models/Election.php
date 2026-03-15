<?php
namespace App\Models;

use App\Core\Model;

class Election extends Model
{
    protected $table = 'elections';
    protected $fillable = [
        'title', 'description', 'election_type', 'branch_id',
        'position_title', 'nomination_start', 'nomination_end',
        'campaign_start', 'campaign_end', 'voting_start', 'voting_end',
        'status', 'created_by'
    ];

    public function getUpcoming($limit = 5)
    {
        $sql = "SELECT * FROM {$this->table} 
                WHERE status IN ('nomination', 'campaign', 'voting') 
                AND voting_end > NOW() 
                ORDER BY voting_start ASC 
                LIMIT ?";
        return $this->db->query($sql)->bind(1, $limit)->resultSet();
    }
}