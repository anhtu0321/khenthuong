@extends('backend.master')
@section('title')
Quản lý Roles
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['route'=>'role.list','name'=>'Role', 'key'=>'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('role.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label >Tên Role</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label >Tên đầy đủ</label>
                                        <input class="form-control" type="text" name="display_name">
                                    </div>
                                    <div class="card text-black col-md-6">

                                        <div class="card-header bg-success">
                                            <input type="checkbox">
                                            Module Sản phẩm
                                        </div>
                                        <div class="row">
                                            <div class="card-body col-md-3">
                                                <input type="checkbox">
                                                Thêm sản phẩm
                                            </div>
      
                                            <div class="card-body col-md-3">
                                                <input type="checkbox">
                                                Thêm sản phẩm
                                            </div>
      
                                            <div class="card-body col-md-3">
                                                <input type="checkbox">
                                                Thêm sản phẩm
                                            </div>
      
                                            <div class="card-body col-md-3">
                                                <input type="checkbox">
                                                Thêm sản phẩm
                                            </div>
      
                                        </div>
                                        
                                    </div>
                                    <button class="btn btn-primary" type="submit">Thêm Role</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
