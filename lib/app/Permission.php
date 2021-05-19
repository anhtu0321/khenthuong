<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function permissionChildrent(){
        return $this->hasMany('App\Permission','parent_id');
    }
}
