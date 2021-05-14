@extends('backend.master')
@section('title')
Quản lý Users
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['name'=>'User', 'key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('user.add') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Tên tài khoản</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', ['id'=> '1']) }}" class="btn btn-default">Sửa</a>
                                        <a href="{{ route('user.delete', ['id'=> '2']) }}" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        <div class="float-right">
                            {{ $users->links() }}
                        </div> 
                    </div>
                    <!-- /.col-md-12 -->
                </div>
            </div>
        </div>
    </div>
@endsection