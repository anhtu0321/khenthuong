<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Permission extends Model
{
    use softDeletes;
    protected $guarded=[];
    public function permissionChildrent(){
        return $this->hasMany('App\Permission', 'parent_id');
    }
}
