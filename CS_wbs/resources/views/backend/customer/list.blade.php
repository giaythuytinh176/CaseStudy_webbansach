@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Danh Sách Khách Hàng
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($customers) == 0)
                                    <tr>
                                        <td colspan="4" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @else
                                    @foreach($customers as $key => $customer)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $customer->first_name }}</td>
                                            <td>{{ $customer->last_name }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>
                                                <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-success">sửa</a>
                                                <a href="{{ route('customer.destroy', $customer->id) }}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                            <a class="btn btn-primary" href="{{ route('customer.create') }}">Thêm mới</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection()
