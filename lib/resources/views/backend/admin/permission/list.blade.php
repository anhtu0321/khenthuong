@extends('backend.master')
@section('title')
Quản lý Permission
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['route'=>'permission.list','name'=>'permission', 'key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('permission.add') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tên permission</th>
                                    <th>Tên Đầy đủ</th>
                                    <th>Key Code</th>
                                    <th>Chức năng cha</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->display_name }}</td>
                                    <td>{{ $permission->key_code }}</td>
                                    <td>
                                        @foreach($percha as $per)
                                            @if($per->id == $permission->parent_id)
                                                {{ $per->name }}
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        <a href="{{ route('permission.edit', ['id'=> $permission->id]) }}" class="btn btn-default">Sửa</a>
                                        <a href="{{ route('permission.delete', ['id'=> $permission->id]) }}" class="btn btn-danger" onclick="return confirm('muốn xóa thật à ?');">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        <div class="float-right">
                            {{ $permissions->links() }}
                        </div> 
                    </div>
                    <!-- /.col-md-12 -->
                </div>
            </div>
        </div>
    </div>
@endsection