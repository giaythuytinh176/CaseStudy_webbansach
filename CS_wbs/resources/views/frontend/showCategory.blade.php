@extends('frontend.master')
@section('content')
    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="/">Thể Loại</a></li>
            <li>{{$category_detail->name}}</li>
        </ol>
    </div>

    <div class="row">

    <div class="region region-content">

        <section id="block-system-main" class="block block-system clearfix">
            <div class="view view-sachbanchay view-id-sachbanchay view-display-id-page_1 view-dom-id-a59a9a93cef40610feae51c1d091cf68 jquery-once-2-processed">
                <div class="view-content ">
                    @php
                        //$arr_book = [];
                        $category_id = $category_detail->id;
                        $book = \App\Models\Book::whereHas('categories', function (\Illuminate\Database\Eloquent\Builder $q) use ($category_id) {
                            $q->where("categories.id", "=", $category_id);
                        })->paginate(4);
                        if (!empty($book[0])) {
                            foreach ($book as $item) {
                    @endphp
                    <div class="views-row views-row-1 views-row-odd views-row-first col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="views-field views-field-nothing">
                        <span class="field-content">
                            <div class="spnew">

                                <div>
                                    <div class="c-product-item--thumbnail-container">

                                        <div class="hovereffect">

                                            <div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>

                                                    <div class="anh-sanpham-moi">
                                                        <a href="{{ route('showbookdetail',$item->id) }}">
                                                            <img class="img-responsive" src="{{ asset('images/'.$item->img) }}" width="185" height="222" alt="" style="display: block;">
                                                            <noscript>
                                                                <img class="img-responsive" src="{{ asset('images/'.$item->img) }}" width="185" height="222" alt="" />
                                                            </noscript>
                                                        </a>
                                                    </div>


                                                    <span class="onsale c-product-item--on-sale">
                                                        <div class="sach-phantram-giamgia">
                                                            <span>-10%</span>
                                                        </div>
                                                    </span>

                                                </span>
                                                <!--</a>-->

                                            </div>

                                        </div>

                                    </div>

                                    <div class="c-product-item--title-container" title="This is Tết! ( Đúng là tết)">
                                                    <a href="{{ route('showbookdetail', $item->id) }}">{{ $item->name }}</a>
                                    </div>
                                </div>
                                <div class="sanpham-giasp">
                                    <div class="gia-sell">{{ $category_detail->name }}</div>
                                </div>
                                <div class="sanpham-giasp">
                                    <div class="gia-sell" style="color: red">{{ number_format($item->price )}} đ</div>
                                </div>

                                <div class="sanpham-giasp">
                                    <div class="gia-cost"></div>
                                </div>

                            </div>
                        </span>
                        </div>
                    </div>
                    @php
                        //$arr_book[] = '<img src="'.asset('images/'.$item->img).'"><a href="'.route('showbookdetail', $item->id).'">'.$item->name.'</a>';
                    }
                    //echo implode("<br/>", $arr_book);
                }
                else {
                    echo "No book";
                }
                    @endphp
                </div>
            </div>
        </section>

    </div>
    </div>
    <div class="text-center">{{ $book->links( "pagination::bootstrap-4") }}</div>

@endsection
