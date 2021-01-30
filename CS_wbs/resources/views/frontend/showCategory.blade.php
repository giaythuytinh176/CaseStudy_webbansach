@extends('frontend.master2')
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
<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="{{ route('cart.add.store', $item->id) }}"
                                       method="get" id="uc-catalog-buy-it-now-form-5976" accept-charset="UTF-8"><div>
<div class="form-actions form-wrapper form-group" id="edit-actions--2"><div class="uc-out-of-stock-instock"
                                                                            style="display: block;">56</div>
    <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
</svg>
              </button>
    <div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>

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
