<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class checkGate {
    public function setGate(){
        Gate::define('user_list', 'App\policies\userPolicy@view');
        Gate::define('user_add', 'App\policies\userPolicy@create');
        Gate::define('user_edit', 'App\policies\userPolicy@update');
        Gate::define('user_delete','App\policies\userPolicy@delete');
    }
}