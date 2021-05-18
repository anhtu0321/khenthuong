@extends('backend.master')
@section('title')
Quản lý Users
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['route'=>'role.list','name'=>'Role', 'key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('role.add') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tên Role</th>
                                    <th>Tên Đầy đủ</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>
                                        <a href="{{ route('role.edit', ['id'=> $role->id]) }}" class="btn btn-default">Sửa</a>
                                        <a href="{{ route('role.delete', ['id'=> $role->id]) }}" class="btn btn-danger" onclick="return confirm('muốn xóa thật à ?');">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        <div class="float-right">
                            {{ $roles->links() }}
                        </div> 
                    </div>
                    <!-- /.col-md-12 -->
                </div>
            </div>
        </div>
    </div>
@endsection