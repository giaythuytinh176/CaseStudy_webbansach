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
                        Chi tiết Sách
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>Name</th>
                                    <td>{{$book_detail->name}}</td>
                                </tr>
                                <tr>
                                    <th>Img</th>
                                    <td>
                                       <img class="img-thumbnail img-fluid" src="{{ asset('images/'.$book_detail->img) }} " alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{$book_detail->price}} </td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>{{$book_detail->stock}} </td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{$book_detail->category_id}} </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{$book_detail->description}} </td>
                                </tr>
                                <tr>
                                    <th>Isbn</th>
                                    <td>{{$book_detail->isbn}} </td>
                                </tr>
                                <tr>
                                    <th>Height</th>
                                    <td>{{$book_detail->height}} </td>
                                </tr>
                                <tr>
                                    <th>Page number</th>
                                    <td>{{$book_detail->page_number}} </td>
                                </tr>
                                <tr>
                                    <th>Release</th>
                                    <td>{{$book_detail->release}} </td>
                                </tr>
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
