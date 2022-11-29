<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedCertificate extends Model
{
    use HasFactory;
    protected $fillable=[
        'achievement_id',
        'status',
        'verification_date',
        'user_id',
        'code',
        'url',
    ];
    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
}
