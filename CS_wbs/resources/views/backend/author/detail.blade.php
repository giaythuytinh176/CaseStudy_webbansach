@extends('backend.master')
@section('content')
    <main>
        <div class="container">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Chi tiết tác giả
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th style="width: 30%">{!! __('language.nameAuthor') !!}</th>
                                <td>{{$author->name}}</td>
                            </tr>
                            <tr>
                                <th style="width: 30%">{!! __('language.BookName') !!}</th>
                                <td>
                                    @php
                                        $arr_book = [];
                                        $author_id = $author->id;
                                        $book = \App\Models\Book::whereHas('authors', function (\Illuminate\Database\Eloquent\Builder $q) use ($author_id) {
                                            $q->where("authors.id", "=", $author_id);
                                        })->get();
                                        if (!empty($book[0])) {
                                            foreach ($book as $item) {
                                                $arr_book[] = '<a href="'.route('book.detail', $item->id).'">'.$item->name.'</a>';
                                            }
                                            echo implode("<br/>", $arr_book);
                                        }
                                        else {
                                            echo "No book";
                                        }
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">{!! __('language.ImageAuthor') !!}</th>
                                <td>
                                    <img class="img-thumbnail img-fluid" src="{{ asset('images/'.$author->image) }} " alt="">
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%">{!! __('language.description') !!}</th>
                                <td>{!! $author->description !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
