<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
class userController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }
    function listUser(){
        $users = $this->user->paginate(10);
        return view('backend.admin.user.list', compact('users'));
    }
    function addUser(){
        $roles = $this->role->get();
        return view('backend.admin.user.add', compact('roles'));
    }
    function storeUser(Request $request){
        try{
            DB::beginTransaction();
            $users = $this->user->create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => $request->password,
            ]);
            $users->role()->attach($request->role);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            $exception->getMessage();
        }
        
        return redirect()->route('user.list');
    }
    function editUser(){
        return view('backend.admin.user.edit');
    }
    function updateUser(){
        dd('update user');
    }
    function deleteUser(){
        dd('xoa user');
    }
 

}
