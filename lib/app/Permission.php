<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function permissionChildren(){
        return $this->hasMany('App\Permission','parent_id');
    }
}
