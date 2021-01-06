@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        Thêm Thể Loại
                    </div>
                    <div class="tables">
                        <form method="post" action="{{ route('customer.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address">
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection
