@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{!! __('language.FirstName') !!}</th>
                                    <th>{!! __('language.LastName') !!}</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($author as $key => $val)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$val->first_name}}</td>
                                        <td>{{$val->last_name}} </td>
                                        <td>
                                            <a href="{{route('author.edit',['id'=> $val->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('author.delete',['id'=>$val->id])}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
