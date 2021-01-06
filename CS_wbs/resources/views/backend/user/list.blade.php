@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Danh Sách Admin
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($users) == 0)
                                    <tr>
                                        <td colspan="4" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @else
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ($user->admin == "1") ? "Super Admin" : "Admin" }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Sửa</a>
                                                <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <a class="btn btn-primary" href="{{ route('user.create') }}">Thêm mới</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection()
