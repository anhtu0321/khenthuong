@extends('backend.master')
@section('title')
Quản lý permissions
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['route'=>'permission.list','name'=>'permission', 'key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('permission.update',['id'=>$permission->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label >Tên permission</label>
                                        <input class="form-control" type="text" name="name" value="{{ $permission->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label >Tên đầy đủ</label>
                                        <input class="form-control" type="text" name="display_name" value="{{ $permission->display_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label >Key Code</label>
                                        <input class="form-control" type="text" name="key_code" value="{{ $permission->key_code }}">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label >Chọn chức năng cha</label>
                                        <select name="parent_id" class="form-control">
                                            <option value="0" selected="selected">Chọn chức năng cha</option>
                                            @foreach($percha as $per)
                                                <option value="{{ $per->id }}" {{ $per->id == $permission->parent_id? 'selected':'' }}>{{ $per->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update permission</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
