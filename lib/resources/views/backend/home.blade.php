@extends("backend.master")
@section('title')
    Home - Admin
@endsection
@section('content')
    <div class="content-wrapper">  
        @include('backend.components.header-content',['name'=>'Home', 'key'=>''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    Day la main con tent
                </div>
            </div>
        </div>
    </div>
@endsection