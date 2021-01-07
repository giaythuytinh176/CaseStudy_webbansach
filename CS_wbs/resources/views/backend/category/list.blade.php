@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Loại Sách
                    </div>
                    <form method="post" action="{{ route('category.search') }}" class="form-inline">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" name="search_category" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($categorys) == 0)
                                    <tr>
                                        <td colspan="4" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @else
                                    @foreach($categorys as $key => $category)
                                        <tr>
                                            <th scope="row">{{ $categorys->firstItem() + $key }}</th>
                                            <td>
                                                <a href="{{ route('category.detail', $category->id) }}">
                                                    {{ $category->name }}
                                                    @php
                                                        $total_book = \App\Models\Category::find($category->id)->books()->count();
                                                        echo "[$total_book]";
                                                    @endphp
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">sửa</a>
                                                <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                            <div style="float: right;">{{ $categorys->links( "pagination::bootstrap-4") }}</div>
                            <a class="btn btn-primary" href="{{ route('category.create') }}">Thêm mới</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection()
