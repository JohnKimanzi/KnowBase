<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    //define relationship
    // public function quizzes()
    // {
    //     return $this->hasMany(Quiz::class);
    // }
    
    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
    
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function attempts()
    {
        return $this->hasManyThrough(AssessmentAttempt::class, Lesson::class);
    }
    public function quizzes()
    {
        return $this->hasManyThrough(Quizz::class, Lesson::class);
    }
    public function certificates()
    {
        return $this->hasMany(GeneratedCertificate::class);
    }
    public function courseToken()
    {
        return $this->hasOne(CourseToken::class);
    }
    
    protected $fillable = [
        'name',
        'user_id',
        'project',
        'description',
    ];
}
