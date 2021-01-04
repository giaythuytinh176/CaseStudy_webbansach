@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Chỉnh sửa thông tin Sách
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                @if (\Illuminate\Support\Facades\Session::has('error'))
                                    <div class="alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
                                @endif
                                <form action="{{ route('book.update', $book_detail->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        <th>Name</th>
                                        <td>
                                            <input type="text" name="name" class="form-control" value="{{$book_detail->name}}">
                                            @if($errors->any())
                                                <p class="alert-danger my-sm-4">{{ $errors->first('name') }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            <img class="img-thumbnail img-fluid" src="{{ asset('images/'.$book_detail->img) }} " alt="">
                                            <input type="file" name="img" class="form-control">
                                            <input type="hidden" name="imgName" class="form-control" value="{{ $book_detail->img }}">
                                            @if($errors->any())
                                                <p class="alert-danger my-sm-4">{{ $errors->first('img') }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>
                                            <input type="number" name="price" class="form-control" value="{{ $book_detail->price }}">
                                            @if($errors->any())
                                                <p class="alert-danger my-sm-4">{{ $errors->first('price') }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Stock</th>
                                        <td>
                                            <input type="number" name="stock" class="form-control" value="{{$book_detail->stock}}">
                                            @if($errors->any())
                                                <p class="alert-danger my-sm-4">{{ $errors->first('stock') }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>
                                            <select name="category_id" required>
                                                @forelse($categories as $k => $v)
                                                    <option value="{{ $v->id }}" {{ ($v->id == $book_detail->category_id) ? "selected" : "" }}>{{ $v->name }}</option>
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
                                        <th>Description</th>
                                        <td>
                                        <textarea id="mytextarea" name="description" cols="100%" rows="25">
                                             {!! $book_detail->description !!}
                                        </textarea>
                                            @if($errors->any())
                                                <p class="alert-danger my-sm-4">{{ $errors->first('description') }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Isbn</th>
                                        <td>
                                            <input type="text" name="isbn" class="form-control" value="{{$book_detail->isbn}}">
                                            @if($errors->any())
                                                <p class="alert-danger my-sm-4">{{ $errors->first('isbn') }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Height</th>
                                        <td>
                                            <input type="text" name="height" class="form-control" value="{{$book_detail->height}}">
                                            @if($errors->any())
                                                <p class="alert-danger my-sm-4">{{ $errors->first('height') }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Page number</th>
                                        <td>
                                            <input type="text" name="page_number" class="form-control" value="{{$book_detail->page_number}}">
                                            @if($errors->any())
                                                <p class="alert-danger my-sm-4">{{ $errors->first('page_number') }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Release</th>
                                        <td>
                                            <input type="date" name="release" class="form-control" value="{{$book_detail->release}}">
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