<?php
namespace App\Models;

use App\Core\Model;

class ForumTopic extends Model
{
    protected $table = 'forum_topics';
    protected $fillable = [
        'forum_id', 'user_id', 'title', 'content',
        'is_pinned', 'is_locked', 'views', 'is_approved'
    ];

    public function getRecent($limit = 5)
    {
        $sql = "SELECT ft.*, u.first_name, u.last_name,
                       (SELECT COUNT(*) FROM forum_comments WHERE topic_id = ft.id) as reply_count
                FROM {$this->table} ft
                JOIN users u ON ft.user_id = u.id
                WHERE ft.is_approved = 1
                ORDER BY ft.created_at DESC 
                LIMIT ?";
        return $this->db->query($sql)->bind(1, $limit)->resultSet();
    }
}