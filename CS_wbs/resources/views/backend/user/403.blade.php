@extends('backend.master')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Account Admin</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="alert alert-danger">{{ $permission }}</div>
                </div>
            </div>
        </div>
    </main>
@endsection
