<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentAttempt extends Model
{
    use HasFactory;
    // protected $dates = ['created_at, updated_at'];

    
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imageSnaps()
    {
        return $this->hasMany(ImageSnap::class);
    }
    // public function generatedCertificate()
    // {
    //     return $this->hasOne(GeneratedCertificate::class);
    // }
   
}
