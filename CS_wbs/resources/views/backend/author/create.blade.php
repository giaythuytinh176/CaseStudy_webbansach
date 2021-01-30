@extends('backend.master')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Thêm tác giả
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{route('author.store')}}" enctype="multipart/form-data">
                            <table class="table">
                                @csrf
                                <tr>
                                    <th style="width: 15%">{!! __('language.nameAuthor') !!}</th>
                                    <td>
                                        <div class="form-control"><input type="text" name="name"></div>
                                        @if ($errors->any())
                                            <div class=" alert-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 15%">{!! __('language.ImageAuthor') !!}</th>
                                    <td>
                                        <input type="file" name="image" class="form-control">
                                        @if($errors->any())
                                            <p class="alert-danger my-sm-4">{{ $errors->first('image') }}</p>
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
                                    <td colspan="2" style="text-align: center">
                                        <div class="form-submit"><input type="submit" value="submit"></div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
