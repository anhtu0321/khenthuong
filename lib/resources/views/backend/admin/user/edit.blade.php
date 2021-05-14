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
                    Sửa User
                </div>
            </div>
        </div>
    </div>
@endsection