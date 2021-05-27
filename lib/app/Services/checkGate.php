<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class checkGate {
    public function setGate(){
        $this->defineGate();
    }

    public function defineGate(){
        // User
        Gate::define('user_list', 'App\policies\userPolicy@view');
        Gate::define('user_add', 'App\policies\userPolicy@create');
        Gate::define('user_edit', 'App\policies\userPolicy@update');
        Gate::define('user_delete','App\policies\userPolicy@delete');
        // Role
        Gate::define('role_list', 'App\policies\rolePolicy@view');
        Gate::define('role_add', 'App\policies\rolePolicy@create');
        Gate::define('role_edit', 'App\policies\rolePolicy@update');
        Gate::define('role_delete','App\policies\rolePolicy@delete');
        // Permission
        Gate::define('permission_list', 'App\policies\permissionPolicy@view');
        Gate::define('permission_add', 'App\policies\permissionPolicy@create');
        Gate::define('permission_edit', 'App\policies\permissionPolicy@update');
        Gate::define('permission_delete','App\policies\permissionPolicy@delete');
    }
}