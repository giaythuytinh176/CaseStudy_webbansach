@extends('frontend.master2')

@section('content')


    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="{{ route('show.home') }}">Trang chủ</a></li>
            <li>{{ $services }}</li>
        </ol>
    </div>
    <div class="container">
    {!! $data_menu_services !!}
    </div>

@endsection
