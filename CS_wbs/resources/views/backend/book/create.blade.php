@extends('backend.master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="card mb-4">
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
                                        <th style="width: 15%">Name</th>
                                        <td>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Img</th>
                                        <td>
                                            <input type="file" name="img" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Price</th>
                                        <td>
                                            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Stock</th>
                                        <td>
                                            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Category</th>
                                        <td>
                                            <select name="category_id" required>
                                                @forelse($categories as $k => $v)
                                                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                                                @empty
                                                    <option>You must create Category</option>
                                                @endforelse
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Description</th>
                                        <td>
                                        <textarea name="description" cols="100%" rows="10">
                                             {{ old('description') }}
                                        </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Isbn</th>
                                        <td>
                                            <input type="text" name="isbn" class="form-control" value="{{ old('isbn') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Height</th>
                                        <td>
                                            <input type="text" name="height" class="form-control" value="{{ old('height') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Page number</th>
                                        <td>
                                            <input type="text" name="page_number" class="form-control" value="{{ old('page_number') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 15%">Release</th>
                                        <td>
                                            <input type="text" name="release" class="form-control" value="{{ old('release') }}">
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
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>


@endsection
