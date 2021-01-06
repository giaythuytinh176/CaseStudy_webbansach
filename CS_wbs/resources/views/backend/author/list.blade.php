@extends('backend.master')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Danh sách tác giả
                </div>
                <form method="post" action="{{ route('author.search') }}" class="form-inline">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="search_author" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{!! __('language.nameAuthor') !!}</th>
                                <th>{!! __('language.ImageAuthor') !!}</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($author as $key => $val)
                                <tr>
                                    <td>{{ $author->firstItem() + $key }}</td>
                                    <td>
                                        <a href="{{ route('author.detail', $val->id) }}">{{$val->name}}</a>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail img-fluid" src="{{ asset('images/'.$val->image) }} " alt="">
                                    </td>
                                    <td>
                                        <a href="{{route('author.edit',['id'=> $val->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('author.delete',['id'=>$val->id])}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td style="text-align: center" colspan="5">Không tìm thấy dữ liệu.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div style="float: right;">{{ $author->links( "pagination::bootstrap-4") }}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
