<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
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
        $this->user->create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
        ]);
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
