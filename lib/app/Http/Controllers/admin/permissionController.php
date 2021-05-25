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
        $percha = $this->permission->where('parent_id',0)->get();
        return view('backend.admin.permission.list', compact('permissions','percha'));
    }
}
