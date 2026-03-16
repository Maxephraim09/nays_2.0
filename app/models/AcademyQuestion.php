<?php
namespace App\Models;

use App\Core\Model;

class AcademyQuestion extends Model
{
    protected $table = 'academy_questions';
    protected $fillable = [
        'subject', 'topic', 'question_text', 'option_a', 'option_b',
        'option_c', 'option_d', 'correct_answer', 'explanation',
        'difficulty', 'exam_type', 'is_premium', 'is_active'
    ];

    public function getCount()
    {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} WHERE is_active = 1";
        $result = $this->db->query($sql)->single();
        return $result ? $result->count : 0;
    }
}