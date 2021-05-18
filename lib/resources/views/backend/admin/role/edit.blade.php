@extends('backend.master')
@section('title')
Quản lý Roles
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['route'=>'role.list','name'=>'Role', 'key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('role.update',['id' => $roles->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label >Tên Role</label>
                                        <input class="form-control" type="text" name="name" value="{{ $roles->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label >Tên đầy đủ</label>
                                        <input class="form-control" type="text" name="display_name" value="{{ $roles->display_name }}">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
