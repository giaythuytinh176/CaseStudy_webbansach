@extends('backend.master')
@section('content')
        <main>
            <div class="container">
                <div class="card mb-4">
                    <div class="card-header">
                        Sửa Admin
                    </div>
                    <div class="tables">
                        <form method="post" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{ $user->email}}">
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Permission</label>
                                <select name="admin">
                                    <option value="1" {{ ($user->admin == "1") ? "selected" : "" }}>Super Admin</option>
                                    <option value="0" {{ ($user->admin == "0") ? "selected" : "" }}>Admin</option>
                                </select>
                                @if($errors->any())
                                    <div class=" alert-danger">{{ $errors->first('admin') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Chỉnh Sửa</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection
