@extends('backend.master')
@section('title')
    Danh sách category
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['name'=>'Category', 'key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    Day la main Category
                </div>
            </div>
        </div>
    </div>
@endsection