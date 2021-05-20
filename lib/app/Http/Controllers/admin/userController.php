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
    function list(){
        $users = $this->user->paginate(10);
        return view('backend.admin.user.list', compact('users'));
    }
    function add(){
        $roles = $this->role->get();
        return view('backend.admin.user.add', compact('roles'));
    }
    function store(Request $request){
        try{
            DB::beginTransaction();
            $users = $this->user->create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]);
            $users->role()->attach($request->role);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            $exception->getMessage();
        }
        
        return redirect()->route('user.list');
    }
    function edit($id){
        $roles = $this->role->get();
        $users = $this->user->find($id);
        $roleOfUser = $users->role;
        return view('backend.admin.user.edit', compact('roles','users','roleOfUser'));
    }
    function update(Request $request, $id){
        try{
            DB::beginTransaction();
            if($request->password !=""){
                $this->user->find($id)->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                ]); 
            }else{
                $this->user->find($id)->update([
                    'name' => $request->name,
                    'username' => $request->username,
                ]);
            }
            $users = $this->user->find($id);
            $users->role()->sync($request->role);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
            $exception->getMessage();
        }
        
        return redirect()->route('user.edit',['id'=>$id]);
    }
    function delete($id){
        $this->user->find($id)->Delete();
        return redirect()-> route('user.list');
    }
}
