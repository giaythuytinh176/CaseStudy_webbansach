@extends('backend.master')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Thêm Sách
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            @if (\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
                            @endif
                            <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <tr>
                                    <th style="width: 15%">{!! __('language.BookName') !!}</th>
                                    <td>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('name') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.author') !!}</th>
                                    <td>
{{--                                            <div class="form-check">--}}
{{--                                                <input--}}
{{--                                                    class="form-check-input"--}}
{{--                                                    name="author[]"--}}
{{--                                                    type="checkbox"--}}
{{--                                                    value="{{ $author->id }}"--}}
{{--                                                    id="flexCheckDefault"--}}
{{--                                                />--}}
{{--                                                <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                                    {{ $author->name }}--}}
{{--                                                    <img class="img-responsive" src="{{ asset('images/'.$author->image) }}" border="1" height="64" width="64" alt=""/>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
                                            <select size="11" name="author[]" class="form-control" multiple>
                                                @foreach($authors as $author)

                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                @endforeach
                                            </select>

                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('author') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.ImageBook') !!}</th>
                                    <td>
                                        <input type="file" name="img" class="form-control">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('img') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.PriceBook') !!}</th>
                                    <td>
                                        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('price') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.StockBook') !!}</th>
                                    <td>
                                        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('stock') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.category') !!}</th>
                                    <td>
                                        <select name="category_id" required>
                                            @forelse($categories as $k => $v)
                                                <option value="{{ $v->id }}">{{ $v->name }}</option>
                                            @empty
                                                <option>You must create Category</option>
                                            @endforelse
                                        </select>
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('category_id') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.description') !!}</th>
                                    <td>
                                        <textarea id="mytextarea" name="description" cols="100%" rows="25">
                                             {{ old('description') }}
                                        </textarea>
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('description') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">Isbn</th>
                                    <td>
                                        <input type="text" name="isbn" class="form-control" value="{{ old('isbn') }}">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('isbn') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.height') !!}</th>
                                    <td>
                                        <input type="text" name="height" class="form-control" value="{{ old('height') }}">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('height') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.pagenumber') !!}</th>
                                    <td>
                                        <input type="text" name="page_number" class="form-control" value="{{ old('page_number') }}">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('page_number') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.release') !!}</th>
                                    <td>
                                        <input type="date" name="release" class="form-control" value="{{ old('release') }}">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('release') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center">
                                        <input type="submit" value="Submit" class="form-submit">
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
