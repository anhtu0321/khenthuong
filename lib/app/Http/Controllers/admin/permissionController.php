<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;

class permissionController extends Controller
{
    private $permission;
    public function __construct(Permission $permission){
        $this->permission = $permission;
    }
    public function list(){
        $permissions = $this->permission->paginate(10);
        $percha = $this->permission->where('parent_id',0)->paginate(10);
        return view('backend.admin.permission.list', compact('permissions','percha'));
    }
    public function add(){
        $percha = $this->permission->where('parent_id',0)->get();
        return view('backend.admin.permission.add', compact('percha'));
    }
    public function store(Request $request){
        $this->permission->create([
            'name' => $request->name,
            'display_name'=> $request->display_name,
            'key_code' => $request->key_code,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('permission.list');
    }
    public function edit($id){
        $permission = $this->permission->find($id);
        $percha = $this->permission->where('parent_id',0)->get();
        return view('backend.admin.permission.edit', compact('permission', 'percha'));
    }
    public function update(Request $request, $id){
        $this->permission->find($id)->update([
            'name' => $request->name,
            'display_name'=> $request->display_name,
            'key_code' => $request->key_code,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('permission.edit',['id'=>$id]);
    }
    public function delete($id){
        $this->permission->find($id)->delete();
        return redirect()->route('permission.list');
    }
}
