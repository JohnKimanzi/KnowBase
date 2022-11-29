<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function certificate()
    {
        return $this->hasOne(GeneratedCertificate::class);
    }
    
    protected $fillable = [
        'course_id',
        'user_id',
        'status',
        'lessons_done'
        
    ];
}
