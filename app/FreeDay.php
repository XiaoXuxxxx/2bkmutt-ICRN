<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeDay extends Model
{
    protected $table = 'free_days';
    protected $guarded = [];

    public function checker(){
        return $this->hasOne("App\User", "checker", "id");
    }

    public function getCamp(){
	return $this->hasOne("App\UserProfile", "camp_id", "camp_id");
    }

    //
}
