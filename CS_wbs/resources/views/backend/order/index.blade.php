@extends('backend.master')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Danh sách đơn hàng
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Id</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $ko => $order)
                                <tr>
                                    <td>{{ $ko + 1 }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        <a href="{{ route('order.show', $order->id) }}">{{ $order->customers()->get()->first()->first_name . " " . $order->customers()->get()->first()->last_name . " [" . $order->customers()->get()->first()->email . "]" }}</a>
                                    </td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <a href="{{ route('order.delete', $order->id) }}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Chưa có đơn hàng.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
