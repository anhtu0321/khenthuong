@extends('backend.master')
@section('title')
Quản lý Roles
@endsection
@section('js')
    <script src="{{ asset('public/admin/role/add.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['route'=>'role.list','name'=>'Role', 'key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
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
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="checkall">
                                            Checkall
                                        </label>
                                        
                                    </div>
                                    <div class="row">
                                        @foreach ($permissionParent as $per)
                                            <div class="card text-black col-md-6">
                                                <div class="card-header bg-success">
                                                    <label>
                                                        <input type="checkbox" class="checkbox-cha">
                                                        {{ $per->name }}
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    @foreach ($per->permissionChildrent as $perChi)
                                                        <div class="card-body col-md-3">
                                                            <label>
                                                                <input type="checkbox" class="checkbox-con" name="permission_id[]" {{  $permission_id->contains('id',$perChi->id)? 'checked': '' }} value="{{ $perChi->id }}">
                                                                {{ $perChi->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
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
