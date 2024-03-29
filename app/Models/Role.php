<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "role_id";

    public function users(){
        return $this->belongsToMany("App\Models\Role","users_roles","role_id","user_id");
    }
}
