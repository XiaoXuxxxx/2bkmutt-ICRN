<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Department;
use App\User;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $guarded = [];

    public function department(){
        return $this->hasOne("App\Department", "id", "dept_id");
    }

    public function user(){
        return $this->hasOne('App\User', "id", "user_id");
    }

}