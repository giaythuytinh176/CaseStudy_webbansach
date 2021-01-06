@extends('backend.master')
@section('content')
    <main>
        <div class="container">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Chi tiết Sách
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>{!! __('language.BookName') !!}</th>
                                <td>{{$book_detail->name}}</td>
                            </tr>
                            <tr>
                                <th>{!! __('language.author') !!}</th>
                                <td>
                                    @php
                                        $arr_author = [];
                                        $author = $book_detail::find($book_detail->id)->authors()->get();
                                        foreach ($author as $item) {
                                            $arr_author[] = '<a href="'.route('author.detail', $item->id).'">'.$item->name.'</a>' . '<img class="img-responsive" src="'. asset('images/'.$item->image) .'" width="64" height="64" alt=""/>';
                                        }
                                        echo implode("<br/>", $arr_author);
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <th>{!! __('language.ImageBook') !!}</th>
                                <td>
                                    <img class="img-thumbnail img-fluid" src="{{ asset('images/'.$book_detail->img) }} " alt="">
                                </td>
                            </tr>
                            <tr>
                                <th>{!! __('language.PriceBook') !!}</th>
                                <td>{{ number_format($book_detail->price) }} đ</td>
                            </tr>
                            <tr>
                                <th>{!! __('language.StockBook') !!}</th>
                                <td>{{$book_detail->stock}} </td>
                            </tr>
                            <tr>
                                <th>{!! __('language.category') !!}</th>
                                <td>{{$category_detail->name}} </td>
                            </tr>
                            <tr>
                                <th>{!! __('language.description') !!}</th>
                                <td>{!! $book_detail->description !!}</td>
                            </tr>
                            <tr>
                                <th>Isbn</th>
                                <td>{{$book_detail->isbn}} </td>
                            </tr>
                            <tr>
                                <th>{!! __('language.height') !!}</th>
                                <td>{{$book_detail->height}} </td>
                            </tr>
                            <tr>
                                <th>{!! __('language.pagenumber') !!}</th>
                                <td>{{$book_detail->page_number}} </td>
                            </tr>
                            <tr>
                                <th>{!! __('language.release') !!}</th>
                                <td>{{$book_detail->release}} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
