@extends('frontend.master')

@section('content')


    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="{{ route('show.home') }}">Trang chủ</a></li>
            <li><a href="/">Sách</a></li>
            <li>Sách mới</li>
        </ol>
    </div>
    <div class="row">
        <section class="col-sm-12">

            <!--// Old breadcrumb here -->
            <a id="main-content"></a>
            <h1 class="page-header">Sách mới</h1>
            <div class="region region-content">
                <section id="block-system-main" class="block block-system clearfix">


                    <div
                        class="view view-ds-sach view-id-ds_sach view-display-id-page view-dom-id-4c88e3c3a91bcd3d6070f6f770bac76f">


                        <div class="view-content ">

                            @foreach($books as $key => $book)
                                <div
                                    class="views-row views-row-1 views-row-odd views-row-first col-xs-6 col-sm-4 col-md-4 col-lg-3 ds-sach-mobile">

                                    <div class="views-field views-field-nothing">        <span class="field-content">
                                    <div class="spnew">

	<div><div class='c-product-item--thumbnail-container'>
	<div class='hovereffect'>
		<div class='anh-sanpham'>
<!--<a href='<div class='sach-phantram-giamgia'><span>-10%</span></div>'>--><span>

<div class='anh-sanpham-moi'><a href="/nham-nhi-tet-tan-suu-2021"><img class="img-responsive"
                                                                       data-src="{{ asset('images/'.$book->img) }}"
                                                                       src="{{ asset('images/'.$book->img) }}"
                                                                       width="800" height="813" alt=""/><noscript><img
                class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/nham-nhi-tet-2021.jpg"
                width="800" height="813" alt=""/></noscript></a></div>
			<span class='onsale c-product-item--on-sale'><div
                    class='sach-phantram-giamgia'><span>-10%</span></div></span>

</span>
            <!--</a>-->
        </div>
	</div>
</div>

<div class='c-product-item--title-container' title="Nhâm nhi Tết Tân Sửu 2021">
    <a href="{{route('showbookdetail', $book->id)}}">{{ $book->name }}</a></div></div>

	<div class='c-loop-authors-summary'>@php
            $category = $book->categories()->first();
            echo ($category->name);
        @endphp</div>
	<div class='sanpham-giasp'><div class='gia-sell' style="color: red">{{number_format( $book->price) }}đ</div></div>

<div class='sanpham-giasp'><div class='gia-cost'></div></div>
	<div class="c-product-yeuthick-mua">
		<div class='sanpham-mua'>
            <form class="ajax-cart-submit-form" action="{{ route('cart.add.store', $book->id) }}" method="get"
                  id="uc-catalog-buy-it-now-form-714936" accept-charset="UTF-8">
<div class="form-actions form-wrapper form-group" id="edit-actions">

    <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
</svg>
              </button>

</div></form>
        </div>

	</div>
</div></span></div>

<<<<<<< HEAD
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                         {{ $books->links( "pagination::bootstrap-4") }}
                </div>
            </section>
        </div>
    </section>

=======
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            {{ $books->links( "pagination::bootstrap-4") }}
                        </div>
                </section>
            </div>
        </section>
>>>>>>> 085ab3b22d1af8e714b995d18b3b80d0955ba8e9
    </div>
    <section id="block-views-sachbanchay-block-9" class="block block-views clearfix">


        <div class="view view-sachbanchay view-id-sachbanchay view-display-id-block_9 mobile-views-slick view-dom-id-73effbdff69b4a7825ad60ecb2c356c8 jquery-once-1-processed">
            <div class="view-header">
                <h2 class="block-title" style="text-align: center"><a href="https://nxbkimdong.com.vn/sach-ban-chay">Sách Bán Chạy</a></h2></div>



            <div class="view-content  slick-initialized slick-slider">
                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 932px; transform: translate3d(0px, 0px, 0px);"><div class="views-row views-row-1 views-row-odd views-row-first slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 233px;">

                            <div class="views-field views-field-nothing">        <span class="field-content"><div class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<span>
<div class="anh-sanpham-moi"><a href="/tu-sach-tuoi-tien-bi-mat-cua-ong-gia-noel-0"><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/bi-mat-ong-gia-noel_bia-_2020.jpg?itok=jI8oT1lt" width="185" height="269" alt="" style="display: block;"><noscript><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/bi-mat-ong-gia-noel_bia-_2020.jpg?itok=jI8oT1lt" width="185" height="269" alt="" /></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
        </div>
	</div>
</div>
<div class="c-product-item--title-container"><a href="/tu-sach-tuoi-tien-bi-mat-cua-ong-gia-noel-0" title="Tủ sách tuổi thần tiên - Bí mật của Ông già Noel
" rel="Tủ sách tuổi thần tiên - Bí mật của Ông già Noel
">Tủ sách tuổi thần tiên - ...</a></div></div>
	<div class="c-loop-authors-summary">Nguyễn Ngọc Hoài Nam</div>
	<div class="sanpham-giasp"><div class="gia-sell">54.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="/" method="post" id="uc-catalog-buy-it-now-form-673270" accept-charset="UTF-8"><div><input type="hidden" name="nid" value="673270">
<input type="hidden" name="form_build_id" value="form-Ark587asYbMfFkGYwg7S8XXdEIU7yl65Klum-89U39I">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_673270">
<input type="hidden" name="product-nid" value="673270">
<div class="form-actions form-wrapper form-group" id="edit-actions--6"><div class="uc-out-of-stock-instock" style="display: block;">81</div><button title="Đặt hàng" class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed" type="submit" id="edit-submit-673270" name="op" value="Mua ngay">Thêm vào giỏ hàng</button><div class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-673270">
      <span class="flag flag-action flag-link-toggle"><a href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node" class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"></a></span>
    </span>
</div>
	</div>
</div></span>  </div>  </div><div class="views-row views-row-2 views-row-even slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 233px;">

                            <div class="views-field views-field-nothing">        <span class="field-content"><div class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<span>
<div class="anh-sanpham-moi"><a href="/doraemon-vol0"><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/doraemon-vol-0-ao-sua_0.jpg?itok=w_O3-NOe" width="185" height="282" alt="" style="display: block;"><noscript><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/doraemon-vol-0-ao-sua_0.jpg?itok=w_O3-NOe" width="185" height="282" alt="" /></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
        </div>
	</div>
</div>
<div class="c-product-item--title-container"><a href="/doraemon-vol0" title="Doraemon Vol.0
" rel="Doraemon Vol.0
">Doraemon Vol.0</a></div></div>
	<div class="c-loop-authors-summary">Fujiko F Fujio</div>
	<div class="sanpham-giasp"><div class="gia-sell">45.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="/" method="post" id="uc-catalog-buy-it-now-form-673430" accept-charset="UTF-8"><div><input type="hidden" name="nid" value="673430">
<input type="hidden" name="form_build_id" value="form-YhPEiqdFfWMNA0pVj8bjGbVGZyaD4GFydw5-Zqlj0_o">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_673430">
<input type="hidden" name="product-nid" value="673430">
<div class="form-actions form-wrapper form-group" id="edit-actions--7"><div class="uc-out-of-stock-instock" style="display: block;">415</div><button title="Đặt hàng" class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed" type="submit" id="edit-submit-673430" name="op" value="Mua ngay">Thêm vào giỏ hàng</button><div class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-673430">
      <span class="flag flag-action flag-link-toggle"><a href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node" class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"></a></span>
    </span>
</div>
	</div>
</div></span>  </div>  </div><div class="views-row views-row-3 views-row-odd slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 233px;">

                            <div class="views-field views-field-nothing">        <span class="field-content"><div class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<span>
<div class="anh-sanpham-moi"><a href="/15-bi-kip-giup-toan-cam-nang-phong-tranh-tai-nan-thuong-tich"><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/cam-nang-phong-tranh-thuong-tich_bia-tb4-2019-final-in-1_0.jpg?itok=_WqEwB-6" width="185" height="268" alt="" style="display: block;"><noscript><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/cam-nang-phong-tranh-thuong-tich_bia-tb4-2019-final-in-1_0.jpg?itok=_WqEwB-6" width="185" height="268" alt="" /></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
        </div>
	</div>
</div>
<div class="c-product-item--title-container"><a href="/15-bi-kip-giup-toan-cam-nang-phong-tranh-tai-nan-thuong-tich" title="15 bí kíp giúp tớ an toàn - Cẩm nang phòng tránh tai nạn thương
tích
" rel="15 bí kíp giúp tớ an toàn - Cẩm nang phòng tránh tai nạn thương
tích
">15 bí kíp giúp tớ an toàn ...</a></div></div>
	<div class="c-loop-authors-summary">Nguyễn Hương Linh</div>
	<div class="sanpham-giasp"><div class="gia-sell">40.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="/" method="post" id="uc-catalog-buy-it-now-form-705710" accept-charset="UTF-8"><div><input type="hidden" name="nid" value="705710">
<input type="hidden" name="form_build_id" value="form-j19C9y3STNQbW31mAOFDkGfQYYXrXCH8qcA9VLpId9U">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_705710">
<input type="hidden" name="product-nid" value="705710">
<div class="form-actions form-wrapper form-group" id="edit-actions--8"><div class="uc-out-of-stock-instock" style="display: block;">1000</div><button title="Đặt hàng" class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed" type="submit" id="edit-submit-705710" name="op" value="Mua ngay">Thêm vào giỏ hàng</button><div class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-705710">
      <span class="flag flag-action flag-link-toggle"><a href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node" class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"></a></span>
    </span>
</div>
	</div>
</div></span>  </div>  </div><div class="views-row views-row-4 views-row-even views-row-last slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 233px;">

                            <div class="views-field views-field-nothing">        <span class="field-content"><div class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<span>
<div class="anh-sanpham-moi"><a href="/ki-nang-kiem-soat-ban-ai-keo-co-xe-truot-tuyet-0"><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/ai-keo-co-xe-truot-tuyet_1.jpg?itok=H1TtXjfB" width="185" height="232" alt="" style="display: block;"><noscript><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/ai-keo-co-xe-truot-tuyet_1.jpg?itok=H1TtXjfB" width="185" height="232" alt="" /></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
        </div>
	</div>
</div>
<div class="c-product-item--title-container"><a href="/ki-nang-kiem-soat-ban-ai-keo-co-xe-truot-tuyet-0" title="Kĩ năng kiểm soát bản thân - Ai kéo cỗ xe trượt tuyết
" rel="Kĩ năng kiểm soát bản thân - Ai kéo cỗ xe trượt tuyết
">Kĩ năng kiểm soát bản ...</a></div></div>
	<div class="c-loop-authors-summary">LEE Eun-ha</div>
	<div class="sanpham-giasp"><div class="gia-sell">36.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="/" method="post" id="uc-catalog-buy-it-now-form-515461" accept-charset="UTF-8"><div><input type="hidden" name="nid" value="515461">
<input type="hidden" name="form_build_id" value="form-wAOdEp__tGS5YI0UwCCPYD1--3lgCWQRFPgqrv-fv3A">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_515461">
<input type="hidden" name="product-nid" value="515461">
<div class="form-actions form-wrapper form-group" id="edit-actions--9"><div class="uc-out-of-stock-instock" style="display: block;">39</div><button title="Đặt hàng" class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed" type="submit" id="edit-submit-515461" name="op" value="Mua ngay">Thêm vào giỏ hàng</button><div class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-515461">
      <span class="flag flag-action flag-link-toggle"><a href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node" class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"></a></span>
    </span>
</div>
	</div>
</div></span>  </div>  </div></div></div>



            </div>






        </div>
    </section>


@endsection
