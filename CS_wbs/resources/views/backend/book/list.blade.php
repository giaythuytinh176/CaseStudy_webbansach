@extends('backend.master')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Danh sách Sách
                </div>
                <form method="post" action="{{ route('book.search') }}" class="form-inline">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="search_book" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>{!! __('language.BookName') !!}</th>
                                <th>{!! __('language.nameAuthor') !!}</th>
                                <th>{!! __('language.category') !!}</th>
                                <th style="width: 30%">{!! __('language.ImageBook') !!}</th>
                                <th style="width: 10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $key => $val)
                                <tr>
                                    <td>{{ $key + $books->firstItem()}}</td>
                                    <td>
                                        <a href="{{ route('book.detail', $val->id) }}">{{$val->name}}</a>
                                    </td>
                                    <td>
                                        @php
                                            $arr_book = [];
                                            $book_id = $val->id;
                                            $book = \App\Models\Author::whereHas('books', function (\Illuminate\Database\Eloquent\Builder $q) use ($book_id) {
                                                $q->where("books.id", "=", $book_id);
                                            })->get();
                                            foreach ($book as $item) {
                                                $arr_book[] = '<a href="'.route('author.detail', $item->id).'">'.$item->name.'</a>';
                                            }
                                            echo implode("<br/><br/>", $arr_book);
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            $book_id = $val->id;
                                            $category = \App\Models\Category::whereHas("books", function (\Illuminate\Database\Eloquent\Builder $q) use ($book_id) {
                                                $q->where("id", "=", $book_id);
                                            })->get();
                                            //echo $category[0]->name;
                                            //$category = \App\Models\Category::with('books')->where('id', '=', $val->category_id)->get();
                                            //foreach($category as $c){
                                                //echo $c->name;
                                            //}
                                            $book = \App\Models\Book::with('categories')->get();
                                            foreach($book as $b){
                                                //dd($b->categories());
                                            }
                                            $category_id = $val->category_id;
                                            $category_name = \App\Models\Book::find($book_id)->categories()->get()->first()->name;
                                            //$category = \App\Models\Category::find($category_id)->books()->get()->toArray();
                                            //dd($category);
                                            echo "
                                                <a href='" . route('category.detail', $category_id) ."'>".$category_name."</a>
                                            ";
                                            //dd(\App\Models\Book::find($book_id)->categories()->get()->first()->name);
                                        @endphp
                                    </td>
                                    <td>
                                        <img class="img-thumbnail img-fluid" src="{{ asset('images/'.$val->img) }} " alt="">
                                    </td>
                                    <td>
                                        <a href="{{route('book.edit',['id'=> $val->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('book.delete',['id'=>$val->id])}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="float: right;">{{ $books->links( "pagination::bootstrap-4") }}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
