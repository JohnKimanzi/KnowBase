<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSnap extends Model
{
    use HasFactory;
    public function assessmentAttempt()
    {
        return $this->belongsTo(AssessmentAttempt::class);
    }
}
