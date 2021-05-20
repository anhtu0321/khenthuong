<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use DB;
class roleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }
    function list(){
        $roles = $this->role->paginate(10);
        return view('backend.admin.role.list', compact('roles'));
    }
    function add(){
        $roles = $this->role->get();
        $permission = $this->permission->where('parent_id',0)->get();
        return view('backend.admin.role.add', compact('roles','permission'));
    }
    function store(Request $request){
        try{
            DB::beginTransaction();
            $roles = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $roles->permissions()->attach($request->permission_id);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollback();
        }
        return redirect()->route('role.list');
    }
    function edit($id){
        $roles = $this->role->find($id);
        return view('backend.admin.role.edit', compact('roles'));
    }
    function update(Request $request, $id){
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]); 
        return redirect()->route('role.edit',['id'=>$id]);
    }
    function delete($id){
        $this->role->find($id)->Delete();
        return redirect()-> route('role.list');
    }
}
