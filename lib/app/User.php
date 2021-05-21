<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
     public function role(){
         return $this -> belongsToMany('App\Role','user__roles','user_id','role_id');
     }

     public function kiemtra($key_code){
         $roles = auth()->user()->role;
         foreach($roles as $role){
             if($role->permissions->contains('key_code',$key_code)){
                 return true;
             }
         }
         return false;
     }
}
