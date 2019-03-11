<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\UserProfile;

class Department extends Model
{
    protected $table = 'departments';
/*
    public function UserProfile(){
        return $this->hasMany('App\UserProfile', 'dept_id');
    }*/

}
