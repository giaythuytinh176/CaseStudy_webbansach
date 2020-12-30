@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Danh sách các Sách trong chủ đề này:
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($category_data) == 0)
                                    <tr>
                                        <td colspan="2" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @else
                                    @foreach($category_data as $key => $c)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td><a href="{{ route("book.detail", $c->id) }}">{{ $c->name }}</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <a class="btn btn-dark" href="{{ route("book.list") }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection()
