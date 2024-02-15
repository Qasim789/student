<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = "user_id";
    protected $fillable = [
        'name',
        'email',
        'address',
        'provider',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(){
        return $this->belongsToMany("App\Models\Role","users_roles","user_id","role_id");
    }

    public function courses(){
        return $this->belongsToMany("App\Models\Course","users_courses","user_id","course_id");
    }

    public function jobs(){
        return $this->belongsToMany("App\Models\Job","users_jobs","user_id","job_id");
    }
}
