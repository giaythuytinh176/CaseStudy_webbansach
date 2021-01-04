@extends('backend.master')
@section('content')
        <main>
            <div class="container">
                <h1 class="mt-4">Dashboard</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        Sửa Thể Loại
                    </div>
                    <div class="tables">
                        <form method="post" action="{{ route('category.update', $category->id) }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $category->name }}">
                                @if($errors->any())
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
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
