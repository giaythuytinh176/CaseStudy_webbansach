@extends('backend.master')
@section('content')
        <main>
            <div class="container">
                <div class="card mb-4">
                    <div class="card-header">Thêm User Admin</div>
                    <div class="tables">
                        <form method="post" action="{{ route('user.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Permission</label>
                                <select name="admin">
                                    <option value="1">Super Admin</option>
                                    <option value="0">Admin</option>
                                </select>
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('admin') }}</div>
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
