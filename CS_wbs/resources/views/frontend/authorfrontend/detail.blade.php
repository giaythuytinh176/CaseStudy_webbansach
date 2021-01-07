@extends('frontend.master')
@section('content')


    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="{{ route('show.home') }}">Trang chủ</a></li>
            <li>Tác giả</li>
            <li><strong>{{ $author_detail->name }}</strong></li>
        </ol>
    </div>


    <div class="row">
        <div id="thong-tin-tac-gia" class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="field field-name-field-tacgia-chandung field-type-image field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <img class="img-responsive" src="{{ asset('images/'.$author_detail->image) }}" width="335"
                                 height="250" alt="" style="display: block;">
                        </div>
                    </div>
                </div>
            </div>
            <div id="tac-gia-right" class="col-xs-12 col-sm-6 col-md-8 ">
                <div class="field field-name-field-tacgia-ten field-type-text field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">{{ $author_detail->name }}</div>
                    </div>
                </div>
                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            {!! $author_detail->description !!}
                            <br/><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="field field-name-field-tacgia-sach field-type-markup field-label-hidden">
            <div class="field-items">
                <div class="field-item even">
                    <div class="relative"><h2>Tác Phẩm Của {{ $author_detail->name }}</h2>
                        <a href="/tim-kiem?title=Françoize+Boucher" class="absolute tacgia-all">Tất cả tác phẩm</a>
                    </div>

                    <div
                        class="view view-ds-sach view-id-ds_sach view-display-id-page_2 view-dom-id-f83ebfd10e24fe10279f03fd33032858">
                        <div class="view-content  slick-initialized slick-slider">
                            <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous"
                                    role="button" style="display: block;">Previous
                            </button>
                            <div aria-live="polite" class="slick-list draggable">
                                <div class="slick-track"
                                     style="opacity: 1; width: 4148px; transform: translate3d(-1220px, 0px, 0px);">
                                    <div class="views-row views-row-3 views-row-odd slick-slide slick-cloned"
                                         data-slick-index="-5" aria-hidden="true" style="width: 244px;">
                                        <div class="views-field views-field-nothing">
                                            <span class="field-content">
                                                <div class="spnew">

</div></span></div>
                                    </div>
                                    <div class="views-row views-row-4 views-row-even slick-slide slick-cloned"
                                         data-slick-index="-4" aria-hidden="true" style="width: 244px;">


                                        <div class="views-field views-field-nothing">        <span
                                                class="field-content"><div class="spnew">
</div></span></div>
                                    </div>
                                    <div class="views-row views-row-6 views-row-even slick-slide slick-cloned"
                                         data-slick-index="-2" aria-hidden="true" style="width: 244px;">

                                        <div class="views-field views-field-nothing">        <span
                                                class="field-content"><div class="spnew">
</div></span></div>
                                    </div>
                                    <div
                                        class="views-row views-row-7 views-row-odd views-row-last slick-slide slick-cloned"
                                        data-slick-index="-1" aria-hidden="true" style="width: 244px;">

                                    </div>
                                    <div
                                        class="views-row views-row-1 views-row-odd views-row-first slick-slide slick-current slick-active"
                                        data-slick-index="0" aria-hidden="false" style="width: 244px;">

                                    </div>
                                    @php
                                        //$arr_book = [];
                                        $author_id = $author_detail->id;
                                        $book = \App\Models\Book::whereHas('authors', function (\Illuminate\Database\Eloquent\Builder $q) use ($author_id) {
                                            $q->where("authors.id", "=", $author_id);
                                        })->get();
                                        if (!empty($book[0])) {
                                            foreach ($book as $item) {
                                                @endphp
                                    <div class="views-row views-row-2 views-row-even slick-slide slick-active"
                                         data-slick-index="1" aria-hidden="false" style="width: 244px;">

                                        <div class="views-field views-field-nothing">        <span
                                                class="field-content"><div class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-phantram-giamgia'><span>-10%</span></div>'>--><span>
<div class="anh-sanpham-moi"><a href="{{ route('showbookdetail', $item->id) }}"><img class="img-responsive"
                                                                            src="{{ asset('images/'.$item->img) }}"
                                                                            width="185" height="265" alt=""
                                                                            style="display: block;"><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/bi-kip-khien-ban-thich-doc-sach_bia.jpg?itok=iB_besSA"
                width="185" height="265" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Bí kíp khiến bạn thích đọc sách
"><a href="{{ route('showbookdetail', $item->id) }}">{{ $item->name }}</a></div></div>
	<div class="c-loop-authors-summary">{{ $author_detail->name }}</div>
	<div class="sanpham-giasp">
        <div class="gia-sell">
            <span class="uc-price">{{ number_format($item->price )}} đ</span>
        </div>
    </div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>


                                                    <div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="/francoize-boucher"
                                       method="post" id="uc-catalog-buy-it-now-form-5976" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="5976">
<input type="hidden" name="form_build_id" value="form-s1DzADtHi2x7n6CLVoyP-IQy6xHwl0WTsor8b6nyKSE">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_5976">
<input type="hidden" name="product-nid" value="5976">
<div class="form-actions form-wrapper form-group" id="edit-actions--2"><div class="uc-out-of-stock-instock"
                                                                            style="display: block;">56</div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-5976" name="op" value="Mua ngay" disabled="disabled">HẾT HÀNG</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-5976">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/557351"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"></a></span>
    </span>
</div>
	</div>
</div></span></div>
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


                            <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next"
                                    role="button" style="display: block;">Next
                            </button>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>






@endsection
