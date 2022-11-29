<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function assessmentAttempts()
    {
        return $this->hasMany(AssessmentAttempt::class);
    }

    public function studyMaterials()
    {
        return $this->hasMany(StudyMaterial::class);
    }
    protected $fillable = [
        'name',
        'course_id',
        'study_time',
        'user_id',
        'description',
        'pass_mark',        
    ];
}
