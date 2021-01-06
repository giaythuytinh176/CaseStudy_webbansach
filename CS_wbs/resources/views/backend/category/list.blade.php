@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Loại Sách
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>
                                                <a href="{{ route('category.detail', $category->id) }}">{{ $category->name }}</a>
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
                            <a class="btn btn-primary" href="{{ route('category.create') }}">Thêm mới</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection()
