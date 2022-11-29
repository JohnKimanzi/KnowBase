<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'personal_email',
        'national_id',
        'country_id',
        'gender_id',
        'marital_status_id',
        'phone1',
        'phone2',
        'dob',
        'dependants',
        'salary',
        'poccupation',
        'reference_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function assessmentAttempts()
    {
        return $this->hasMany(AssessmentAttempt::class);
    }
    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }
}
