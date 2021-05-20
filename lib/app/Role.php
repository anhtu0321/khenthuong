<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Role extends Model
{
    use softDeletes;
    protected $guarded=[];
    public function permissions(){
        return $this-> belongsToMany('App\Permission','role__permissions','role_id','permission_id');
    }
}
