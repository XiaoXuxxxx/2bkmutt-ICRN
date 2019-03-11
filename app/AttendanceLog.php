<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    protected $table = 'attendance_logs';
    protected $guarded = [];

    public function checker(){
        return $this->hasOne("App\User", "checker", "id");
    }

//    public function dorm(){
//	return $this->hasOne("App\UserProfile", "camp_id", "camp_id");
 //   }
}
