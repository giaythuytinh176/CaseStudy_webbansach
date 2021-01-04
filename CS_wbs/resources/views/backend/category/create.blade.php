@extends('backend.master')
@section('content')
        <main>
            <div class="container">
                <h1 class="mt-4">Dashboard</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        {!! __('language.add_category') !!}
                    </div>
                    <div class="tables">
                        <form method="post" action="{{ route('category.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>{!! __('language.CategoryName') !!}</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name">
                                @if($errors->any())
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">{!! __('language.Add') !!}</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">{!! __('language.Back') !!}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection
