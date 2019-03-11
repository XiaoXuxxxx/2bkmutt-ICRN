<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Department;

class StaffProfile extends Model
{
    protected $table = 'staff_profiles';
    protected $guarded = [];

    public function department(){
        return $this->hasOne("App\Department", "id", "dept_id");
    }
}
