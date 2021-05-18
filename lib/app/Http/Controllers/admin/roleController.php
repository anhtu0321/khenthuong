<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
class roleController extends Controller
{
    private $role;
    public function __construct(Role $role){
        $this->role = $role;
    }
    function list(){
        $roles = $this->role->paginate(10);
        return view('backend.admin.role.list', compact('roles'));
    }
    function add(){
        $roles = $this->role->get();
        return view('backend.admin.role.add', compact('roles'));
    }
    function store(Request $request){
            $roles = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
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
