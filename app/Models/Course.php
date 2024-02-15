<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = "courses";
    protected $primaryKey = "course_id";

    protected $fillable = [
        'course_title','course_description'
    ];

    public function users(){
        return $this->belongsToMany("App\Models\User","users_courses","course_id","user_id");
    }

    public function comments(){
        return $this->hasMany("App\Models\Comment","course_id","course_id");
    }

}
