@extends('backend.master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Danh sách Sách
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th style="width: 30%">Img</th>
                                    <th style="width: 15%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($books as $key => $val)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <a href="{{ route('book.detail', $val->id) }}">{{$val->name}}</a>
                                        </td>
                                        <td>
                                            @php
                                            $id_book = $val->id;
                                            $book_category = \App\Models\Category::whereHas("books", function(\Illuminate\Database\Eloquent\Builder $q) use ($id_book) {
                                                $q->where("id", "=", $id_book);
                                            })->get();
                                            echo $book_category[0]->name;
                                            @endphp
                                        </td>
                                        <td>
                                            <img class="img-thumbnail img-fluid" src="{{ asset('images/'.$val->img) }} " alt="">
                                        </td>
                                        <td>
                                            <a href="{{route('author.edit',['id'=> $val->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('author.delete',['id'=>$val->id])}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

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
