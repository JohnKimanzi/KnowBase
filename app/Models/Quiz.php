<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable=[
        'user_id',
        'lesson_id',
        'question',
        'choices',
        'correct_choice',
    ];
}
