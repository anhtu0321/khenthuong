@extends('backend.master')
@section('title')
Quản lý Users
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('public/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/user/add.css')}}">
@endsection
@section('js')
    <script src="{{ asset('public/select2/select2.min.js') }}"></script>
    <script>
        $('.select2-init').select2({
            'placeholder':'Chọn vai trò'
        })
    </script>
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['route'=>'user.list','name'=>'User', 'key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('user.update',['id' => $users->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label >Tên đầy đủ</label>
                                        <input class="form-control" type="text" name="name" value="{{ $users->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label >Tên tài khoản</label>
                                        <input class="form-control" type="text" name="username" value="{{ $users->username }}">
                                    </div>
                                    <div class="form-group">
                                        <label >Mật khẩu</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label >Chọn vai trò</label>
                                        <select class="form-control select2-init" name="role[]" multiple>
                                            <option value=""></option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" 
                                                    {{ $roleOfUser->contains('id', $role->id) ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
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
