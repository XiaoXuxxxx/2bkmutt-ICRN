<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    protected $table = 'user_projects';
    protected $fillable = ['profile_id','project_th','project_en','professor_en','professor_th'];
}