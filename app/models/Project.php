<?php
namespace App\Models;

use App\Core\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'branch_id', 'title', 'description', 'category',
        'goal_amount', 'raised_amount', 'start_date', 'end_date',
        'status', 'progress_percent', 'created_by', 'approved_by'
    ];

    public function getCount()
    {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE status IN ('approved', 'in_progress', 'completed')";
        $result = $this->db->query($sql)->single();
        return $result ? $result->count : 0;
    }
}