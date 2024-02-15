<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $primaryKey = "comment_id";
    protected $fillable = [
        'comment_title','user_id'
    ];
    public function course(){
        return $this->belongsTo("App\Models\Course","course_id");
    }

    public function user(){
        return $this->belongsTo("App\Models\User","user_id");
    }
}  
     