<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseToken extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'course_id',
        'user_id',
        'code',
        'description',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
