@extends('frontend.master')

@section('content')


    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="{{ route('show.home') }}">Trang chủ</a></li>
            <li><a href="/">SÁCH THEO CHỦ ĐỀ</a></li>
            <li><strong>{{ $bookdetail->name }}</strong></li>
        </ol>
    </div>
    <div class="row">
    <article id="node-680607" class="node node-product clearfix">
        <div class="row chitietsp">
            <div class="col-xs-12 col-sm-6 col-md-5">
                <div class="field field-name-uc-product-image field-type-image field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <div class="product-image">
                                <div class="main-product-image"><a href="sites/default/files/9-lmt_0.jpg" title=""
                                                                   class="colorbox init-colorbox-processed cboxElement"
                                                                   rel="uc_image_0"><img class="img-responsive"
                                                                                         src="{{asset('images/'.$bookdetail->img)}}"
                                                                                         alt="" title=""
                                                                                         style="display: block;">
                                        <noscript><img class="img-responsive"
                                                       src="{{asset('images/'.$bookdetail->img)}}"
                                                       alt="" title=""/></noscript>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field field-name-field-product-phantram-giam field-type-markup field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <div class="sach-phantram-giamgia"><span>-10%</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-7 thong-tin-chung-sach">
                <div class="clear-fix">
                    <div class="field field-name-field-product-tensach field-type-text field-label-hidden">
                        <div class="field-items">
                            <div class="field-item even">{{ $bookdetail->name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear-fix row">
                    <div class="group-product-content-left field-group-div col-sm-6">
                        <div
                            class="field field-name-field-product-makimdong field-type-text field-label-inline clearfix">
                            <div class="field-label">Mã Kim Đồng:&nbsp;{{$bookdetail->isbn}}</div>
                        </div>
                        <div
                            class="field field-name-field-product-tacgia field-type-entityreference field-label-inline clearfix">
                            <div class="field-label">Tác giả:&nbsp;</div>
                            <div class="field-items">
                                <div class="field-item even">
                                    @php
                                        $arr_author = [];
                                        $author = $bookdetail->authors()->get();
                                        foreach ($author as $item) {
                                            $arr_author[] = '<a href="'.route('author.detail', $item->id).'">'.$item->name.'</a>';
                                        }
                                        echo implode("<br/>", $arr_author);
                                    @endphp
                                </div>

                            </div>
                        </div>
                        <div
                            class="field field-name-field-product-sotrang field-type-number-decimal field-label-inline clearfix">
                            <div class="field-label">Số trang:&nbsp;</div>
                            <div class="field-items">
                                <div class="field-item even">{{ $bookdetail->page_number }}</div>
                            </div>
                        </div>
                        <div
                            class="field field-name-field-product-trongluong field-type-number-decimal field-label-inline clearfix">
                            <div class="field-label">Trọng lượng:&nbsp;</div>
                            <div class="field-items">
                                <div class="field-item even">{{$bookdetail->height}}</div>
                            </div>
                        </div>

                        <div
                            class="field field-name-field-product-phathanh field-type-datetime field-label-inline clearfix">
                            <div class="field-label">Ngày phát hành:&nbsp;</div>
                            <div class="field-items">
                                <div class="field-item even"><span class="date-display-single">{{$bookdetail->release}}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="group-product-content-right field-group-div col-sm-6  relative">
                        <div class="field field-name-field-product-giatien-markup field-type-markup field-label-hidden">
                            <div class="field-items">
                                <div class="field-item even">
                                    <div class="sanpham-giasp clearfix">
                                        <div class="gia-bia"></div>
                                        <div class="gia-cost">Giá bìa: <span class="uc-price">{{ number_format($bookdetail->price*1.1) }}đ</span></div>
                                        <div class="gia-ban"></div>
                                        <div class="gia-sell">Giá bán: <span class="uc-price">{{ number_format($bookdetail->price) }}đ</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-to-cart foo">
                        <form class="ajax-cart-submit-form uc-out-stock-processed"
                              action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                              method="post" id="uc-product-add-to-cart-form-680607" accept-charset="UTF-8">
                            <div><input type="hidden" name="form_build_id"
                                        value="form-6sZR2eYxkUoFbf4dcY1hzKmvyAXG7P3VLNfJztBBsLM">
                                <input type="hidden" name="form_id" value="uc_product_add_to_cart_form_680607">
                                <input type="hidden" name="product-nid" value="680607">
                                <div class="form-actions form-wrapper form-group" id="edit-actions--45">
                                    <button
                                        class="node-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
                                        type="submit" id="edit-submit-680607" name="op" value="Mua ngay"
                                        style="display: none;">Thêm vào giỏ hàng
                                    </button>
                                    <div class="uc_out_of_stock_html"><span class="out-of-stock het-hang"><i
                                                class="fa fa-shopping-cart" title="Hết hàng"></i></span></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flag-outer flag-outer-sach-yeuthich">
<span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-680607">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"></a></span>
    </span>
                    </div>
                    <div class="field field-name-field-news-chiase field-type-markup field-label-hidden">
                        <div class="field-items">
                            <div class="field-item even">
                                <div id="fb-root" class=" fb_reset">
                                    <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
                                        <div></div>
                                    </div>
                                </div>
                                <script>(function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=239259646576281";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>
                                <div class="fb-like fb_iframe_widget" data-href="https://nxbkimdong.com.vn/node/680607"
                                     data-layout="button_count" data-action="like" data-size="small"
                                     data-show-faces="true" data-share="true" fb-xfbml-state="rendered"
                                     fb-iframe-plugin-query="action=like&amp;app_id=239259646576281&amp;container_width=0&amp;href=https%3A%2F%2Fnxbkimdong.com.vn%2Fnode%2F680607&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small">
                                    <span style="vertical-align: bottom; width: 150px; height: 28px;"><iframe
                                            name="f21198ccf7688a4" width="1000px" height="1000px"
                                            data-testid="fb:like Facebook Social Plugin"
                                            title="fb:like Facebook Social Plugin" frameborder="0"
                                            allowtransparency="true" allowfullscreen="true" scrolling="no"
                                            allow="encrypted-media"
                                            src="https://www.facebook.com/v6.0/plugins/like.php?action=like&amp;app_id=239259646576281&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df1e1653dce440a8%26domain%3Dnxbkimdong.com.vn%26origin%3Dhttps%253A%252F%252Fnxbkimdong.com.vn%252Ff18b498176c724c%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fnxbkimdong.com.vn%2Fnode%2F680607&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small"
                                            style="border: none; visibility: visible; width: 150px; height: 28px;"
                                            class=""></iframe></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="field field-name-field-product-countdown field-type-markup field-label-hidden">
                        <div class="field-items">
                            <div class="field-item even"></div>
                        </div>
                    </div>
                </div>
                <div class="field field-name-field-product-gioithieu field-type-markup field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even"><h4 class="block-title">Giới thiệu tác phẩm</h4>{!!$bookdetail->description!!}</div>
                    </div>
                </div>
                <div class="field field-name-field-product-affiliate field-type-markup field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even"></div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <div
        class="view view-sachbanchay view-id-sachbanchay view-display-id-block_4 mobile-views-slick view-dom-id-09a76f9f5b3bb9846769f6185aab33ba jquery-once-1-processed">
        <div class="view-header">
            <h2 class="block-title">Sách cùng tác giả</h2></div>


        <div class="view-content  slick-initialized slick-slider">
            <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button"
                    style="display: block;">Previous
            </button>
            <div aria-live="polite" class="slick-list draggable">
                <div class="slick-track" style="opacity: 1; width: 5368px; transform: translate3d(-1220px, 0px, 0px);"
                     role="listbox">
                    <div class="views-row views-row-8 views-row-even slick-slide slick-cloned" data-slick-index="-5"
                         aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-6-tang-01-postcard-ban-pho-thong"
                                tabindex="-1"><img class="img-responsive"
                                                   data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/6_60.jpg?itok=fVvmH6Vh"
                                                   src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                   width="185" height="266" alt=""><noscript><img class="img-responsive"
                                                                                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/6_60.jpg?itok=fVvmH6Vh"
                                                                                                  width="185"
                                                                                                  height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 6 (Tặng 01 Postcard) - Bản
Phổ Thông
"><a href="/grimgar-ao-anh-va-tro-tan-tap-6-tang-01-postcard-ban-pho-thong"
     tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="275919"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-31f9ziM4n3LkLhfWsnQa5g5tmA_8xqGvZ8vFGSOqvSc" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_275919" tabindex="-1">
<input type="hidden" name="product-nid" value="275919" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-275919">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-9 views-row-odd slick-slide slick-cloned" data-slick-index="-4"
                         aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-6" tabindex="-1"><img class="img-responsive"
                                                                                           data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/6_60.jpg?itok=fVvmH6Vh"
                                                                                           src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                                                           width="185" height="266"
                                                                                           alt=""><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/6_60.jpg?itok=fVvmH6Vh"
                width="185" height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 6 (Tặng 01 Short-story + 01
Postcard) - Bản Giới Hạn
"><a href="/grimgar-ao-anh-va-tro-tan-tap-6" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="265601"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-a-iOeiuqo9usi9bPcbNyz2SmoohbGR9mqikHMlXna8Y" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_265601" tabindex="-1">
<input type="hidden" name="product-nid" value="265601" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-265601">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-10 views-row-even slick-slide slick-cloned" data-slick-index="-3"
                         aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-5-tang-kem-nhan-vat" tabindex="-1"><img
            class="img-responsive"
            data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/5_46.jpg?itok=gieN3cmV"
            src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif" width="185" height="266"
            alt=""><noscript><img class="img-responsive"
                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/5_46.jpg?itok=gieN3cmV"
                                  width="185" height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 5 - Tặng kèm thẻ nhân vật
"><a href="/grimgar-ao-anh-va-tro-tan-tap-5-tang-kem-nhan-vat" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="164806"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-7hLI9r9DJeD5mmut2A0MuUOhsQMZJdQBUSr8ARb3OZY" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_164806" tabindex="-1">
<input type="hidden" name="product-nid" value="164806" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-164806">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-11 views-row-odd slick-slide slick-cloned" data-slick-index="-2"
                         aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-4" tabindex="-1"><img class="img-responsive"
                                                                                           data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/4_16.jpg?itok=_jv1pbYx"
                                                                                           src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                                                           width="185" height="267"
                                                                                           alt=""><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/4_16.jpg?itok=_jv1pbYx"
                width="185" height="267" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 4
"><a href="/grimgar-ao-anh-va-tro-tan-tap-4" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="123297"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-bxqhiZq2dw6V2GmJdqbn5ZhF1KnmrzGyME3KnGo4Huc" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_123297" tabindex="-1">
<input type="hidden" name="product-nid" value="123297" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-123297">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-12 views-row-even views-row-last slick-slide slick-cloned"
                         data-slick-index="-1" aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-3" tabindex="-1"><img class="img-responsive"
                                                                                           src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/3_43.jpg?itok=cTUB1sRh"
                                                                                           width="185" height="277"
                                                                                           alt=""
                                                                                           style="display: block;"><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/3_43.jpg?itok=cTUB1sRh"
                width="185" height="277" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 3
"><a href="/grimgar-ao-anh-va-tro-tan-tap-3" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="91339"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-XtDvwsnFsPf2PU-YNNx_pfZ5wG1v0N7lVBNc-QYy3pM" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_91339" tabindex="-1">
<input type="hidden" name="product-nid" value="91339" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-91339">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div
                        class="views-row views-row-1 views-row-odd views-row-first slick-slide slick-current slick-active"
                        data-slick-index="0" aria-hidden="false" style="width: 244px;" tabindex="-1" role="option"
                        aria-describedby="slick-slide00">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-ban-pho-thong" tabindex="0"><img
            class="img-responsive"
            src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/9_92.jpg?itok=UCh_yxPu"
            width="185" height="266" alt="" style="display: block;"><noscript><img class="img-responsive"
                                                                                   src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/9_92.jpg?itok=UCh_yxPu"
                                                                                   width="185" height="266"
                                                                                   alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 9 (Tặng 01 bookmark) - Bản
Phổ Thông
"><a href="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-ban-pho-thong" tabindex="0">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-680596" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="680596" tabindex="0">
<input type="hidden" name="form_build_id" value="form-QPhMw7pm7FPcmqPmI1QjKgJ4SDXzzvlfLw4DckVUOZI" tabindex="0">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_680596" tabindex="0">
<input type="hidden" name="product-nid" value="680596" tabindex="0">
<div class="form-actions form-wrapper form-group" id="edit-actions--21"><div class="uc-out-of-stock-instock"
                                                                             style="display: none;"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-680596" name="op" value="Mua ngay" tabindex="0" style="display: none;">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"><span class="out-of-stock het-hang"><i class="fa fa-shopping-cart"
                                                                            title="Hết hàng"></i></span></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-680596">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="0"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-2 views-row-even slick-slide slick-active" data-slick-index="1"
                         aria-hidden="false" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide01">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-8-tang-01-bookmark-ban-pho-thong" tabindex="0"><img
            class="img-responsive"
            src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8_89.jpg?itok=8b7rzwiI"
            width="185" height="266" alt="" style="display: block;"><noscript><img class="img-responsive"
                                                                                   src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8_89.jpg?itok=8b7rzwiI"
                                                                                   width="185" height="266"
                                                                                   alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 8 (Tặng 01 bookmark) - Bản
Phổ Thông
"><a href="/grimgar-ao-anh-va-tro-tan-tap-8-tang-01-bookmark-ban-pho-thong" tabindex="0">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">81.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-580452" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="580452" tabindex="0">
<input type="hidden" name="form_build_id" value="form-Af1_9xm3Kna0u1yDP8g-Xj0lGKGFrrdEJOLt5Lvjxtw" tabindex="0">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_580452" tabindex="0">
<input type="hidden" name="product-nid" value="580452" tabindex="0">
<div class="form-actions form-wrapper form-group" id="edit-actions--22"><div class="uc-out-of-stock-instock"
                                                                             style="display: block;">17</div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-580452" name="op" value="Mua ngay" tabindex="0">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-580452">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="0"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-3 views-row-odd slick-slide slick-active" data-slick-index="2"
                         aria-hidden="false" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide02">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-8-tang-01-bookmark-02-cuon-fanbook-ban-gioi-han"
                                tabindex="0"><img class="img-responsive"
                                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8-lmt_0.jpg?itok=tWZKP7Yb"
                                                  width="185" height="266" alt="" style="display: block;"><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8-lmt_0.jpg?itok=tWZKP7Yb"
                width="185" height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 8 (Tặng 01 bookmark + 02 cuốn
fanbook ) - Bản Giới Hạn
"><a href="/grimgar-ao-anh-va-tro-tan-tap-8-tang-01-bookmark-02-cuon-fanbook-ban-gioi-han" tabindex="0">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">81.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-580399" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="580399" tabindex="0">
<input type="hidden" name="form_build_id" value="form-6W0uHGPj8f5xP-9GeRmUtr9im7c_Y4UOip0jRHipCFM" tabindex="0">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_580399" tabindex="0">
<input type="hidden" name="product-nid" value="580399" tabindex="0">
<div class="form-actions form-wrapper form-group" id="edit-actions--23"><div class="uc-out-of-stock-instock"
                                                                             style="display: none;"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-580399" name="op" value="Mua ngay" tabindex="0" style="display: none;">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"><span class="out-of-stock het-hang"><i class="fa fa-shopping-cart"
                                                                            title="Hết hàng"></i></span></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-580399">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="0"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-4 views-row-even slick-slide slick-active" data-slick-index="3"
                         aria-hidden="false" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide03">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-2-tang-01-fanbook-cendres" tabindex="0"><img
            class="img-responsive"
            src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/2_233.jpg?itok=B_01yNdk"
            width="185" height="266" alt="" style="display: block;"><noscript><img class="img-responsive"
                                                                                   src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/2_233.jpg?itok=B_01yNdk"
                                                                                   width="185" height="266"
                                                                                   alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 2 (Tặng 01 fanbook Cendres)
"><a href="/grimgar-ao-anh-va-tro-tan-tap-2-tang-01-fanbook-cendres" tabindex="0">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-582549" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="582549" tabindex="0">
<input type="hidden" name="form_build_id" value="form-9ktmKIeNafKcgf5QlX1rL753jiddWQqsCJlg9BMfDIs" tabindex="0">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_582549" tabindex="0">
<input type="hidden" name="product-nid" value="582549" tabindex="0">
<div class="form-actions form-wrapper form-group" id="edit-actions--24"><div class="uc-out-of-stock-instock"
                                                                             style="display: block;">18</div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-582549" name="op" value="Mua ngay" tabindex="0">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-582549">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="0"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-5 views-row-odd slick-slide slick-active" data-slick-index="4"
                         aria-hidden="false" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide04">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-1-tang-01-fanbook-fantaisie" tabindex="0"><img
            class="img-responsive"
            src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/1_64.jpg?itok=Iz3FS9eb"
            width="185" height="267" alt="" style="display: block;"><noscript><img class="img-responsive"
                                                                                   src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/1_64.jpg?itok=Iz3FS9eb"
                                                                                   width="185" height="267"
                                                                                   alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 1 (Tặng 01 fanbook Fantaisie)
"><a href="/grimgar-ao-anh-va-tro-tan-tap-1-tang-01-fanbook-fantaisie"
     tabindex="0">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-582519" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="582519" tabindex="0">
<input type="hidden" name="form_build_id" value="form-dBwci4iOSxVHFyPb0Ncnmk_jzLF4TYjLSYo9ZeKeDNw" tabindex="0">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_582519" tabindex="0">
<input type="hidden" name="product-nid" value="582519" tabindex="0">
<div class="form-actions form-wrapper form-group" id="edit-actions--25"><div class="uc-out-of-stock-instock"
                                                                             style="display: block;">9</div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-582519" name="op" value="Mua ngay" tabindex="0">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-582519">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="0"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-6 views-row-even slick-slide" data-slick-index="5"
                         aria-hidden="true" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide05">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Ao Jyumonji</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-7-tang-01-nhan-vat-ban-pho-thong"
                                tabindex="-1"><img class="img-responsive"
                                                   src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/7_85.jpg?itok=O3CxXjWP"
                                                   width="185" height="266" alt="" style="display: block;"><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/7_85.jpg?itok=O3CxXjWP"
                width="185" height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 7 (Tặng 01 thẻ nhân vật) -
Bản Phổ Thông
"><a href="/grimgar-ao-anh-va-tro-tan-tap-7-tang-01-nhan-vat-ban-pho-thong"
     tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji</div>
	<div class="sanpham-giasp"><div class="gia-sell">81.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-512992" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="512992" tabindex="-1">
<input type="hidden" name="form_build_id" value="form-IsQCyQO_jJjMAvWk8iOvuxWnrwRydymRiRettRX2XtM" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_512992" tabindex="-1">
<input type="hidden" name="product-nid" value="512992" tabindex="-1">
<div class="form-actions form-wrapper form-group" id="edit-actions--26"><div class="uc-out-of-stock-instock"
                                                                             style="display: block;">24</div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-512992" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-512992">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-7 views-row-odd slick-slide" data-slick-index="6" aria-hidden="true"
                         style="width: 244px;" tabindex="-1" role="option" aria-describedby="slick-slide06">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-7-tang-01-nhan-vat-01-poster-ban-gioi-han"
                                tabindex="-1"><img class="img-responsive"
                                                   data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/7_83.jpg?itok=_6xZQteW"
                                                   src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                   width="185" height="266" alt=""><noscript><img class="img-responsive"
                                                                                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/7_83.jpg?itok=_6xZQteW"
                                                                                                  width="185"
                                                                                                  height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 7 (Tặng 01 thẻ nhân vật + 01
Poster) - Bản Giới Hạn
"><a href="/grimgar-ao-anh-va-tro-tan-tap-7-tang-01-nhan-vat-01-poster-ban-gioi-han" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">81.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-512993" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="512993" tabindex="-1">
<input type="hidden" name="form_build_id" value="form-BJbGL6sjp4OnGO9NO8aMi9od6ulDoR3Vxfoqw4Qp16k" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_512993" tabindex="-1">
<input type="hidden" name="product-nid" value="512993" tabindex="-1">
<div class="form-actions form-wrapper form-group" id="edit-actions--27"><div class="uc-out-of-stock-instock"
                                                                             style="display: none;"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-512993" name="op" value="Mua ngay" tabindex="-1" style="display: none;">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"><span class="out-of-stock het-hang"><i class="fa fa-shopping-cart"
                                                                            title="Hết hàng"></i></span></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-512993">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-8 views-row-even slick-slide" data-slick-index="7"
                         aria-hidden="true" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide07">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-6-tang-01-postcard-ban-pho-thong"
                                tabindex="-1"><img class="img-responsive"
                                                   data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/6_60.jpg?itok=fVvmH6Vh"
                                                   src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                   width="185" height="266" alt=""><noscript><img class="img-responsive"
                                                                                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/6_60.jpg?itok=fVvmH6Vh"
                                                                                                  width="185"
                                                                                                  height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 6 (Tặng 01 Postcard) - Bản
Phổ Thông
"><a href="/grimgar-ao-anh-va-tro-tan-tap-6-tang-01-postcard-ban-pho-thong"
     tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-275919" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="275919" tabindex="-1">
<input type="hidden" name="form_build_id" value="form-31f9ziM4n3LkLhfWsnQa5g5tmA_8xqGvZ8vFGSOqvSc" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_275919" tabindex="-1">
<input type="hidden" name="product-nid" value="275919" tabindex="-1">
<div class="form-actions form-wrapper form-group" id="edit-actions--28"><div class="uc-out-of-stock-instock"
                                                                             style="display: block;">27</div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-275919" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-275919">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-9 views-row-odd slick-slide" data-slick-index="8" aria-hidden="true"
                         style="width: 244px;" tabindex="-1" role="option" aria-describedby="slick-slide08">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-6" tabindex="-1"><img class="img-responsive"
                                                                                           data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/6_60.jpg?itok=fVvmH6Vh"
                                                                                           src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                                                           width="185" height="266"
                                                                                           alt=""><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/6_60.jpg?itok=fVvmH6Vh"
                width="185" height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 6 (Tặng 01 Short-story + 01
Postcard) - Bản Giới Hạn
"><a href="/grimgar-ao-anh-va-tro-tan-tap-6" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-265601" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="265601" tabindex="-1">
<input type="hidden" name="form_build_id" value="form-a-iOeiuqo9usi9bPcbNyz2SmoohbGR9mqikHMlXna8Y" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_265601" tabindex="-1">
<input type="hidden" name="product-nid" value="265601" tabindex="-1">
<div class="form-actions form-wrapper form-group" id="edit-actions--29"><div class="uc-out-of-stock-instock"
                                                                             style="display: none;"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-265601" name="op" value="Mua ngay" tabindex="-1" style="display: none;">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"><span class="out-of-stock het-hang"><i class="fa fa-shopping-cart"
                                                                            title="Hết hàng"></i></span></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-265601">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-10 views-row-even slick-slide" data-slick-index="9"
                         aria-hidden="true" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide09">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-5-tang-kem-nhan-vat" tabindex="-1"><img
            class="img-responsive"
            data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/5_46.jpg?itok=gieN3cmV"
            src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif" width="185" height="266"
            alt=""><noscript><img class="img-responsive"
                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/5_46.jpg?itok=gieN3cmV"
                                  width="185" height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 5 - Tặng kèm thẻ nhân vật
"><a href="/grimgar-ao-anh-va-tro-tan-tap-5-tang-kem-nhan-vat" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-164806" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="164806" tabindex="-1">
<input type="hidden" name="form_build_id" value="form-7hLI9r9DJeD5mmut2A0MuUOhsQMZJdQBUSr8ARb3OZY" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_164806" tabindex="-1">
<input type="hidden" name="product-nid" value="164806" tabindex="-1">
<div class="form-actions form-wrapper form-group" id="edit-actions--30"><div class="uc-out-of-stock-instock"
                                                                             style="display: block;">54</div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-164806" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-164806">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-11 views-row-odd slick-slide" data-slick-index="10"
                         aria-hidden="true" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide010">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-4" tabindex="-1"><img class="img-responsive"
                                                                                           data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/4_16.jpg?itok=_jv1pbYx"
                                                                                           src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                                                           width="185" height="267"
                                                                                           alt=""><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/4_16.jpg?itok=_jv1pbYx"
                width="185" height="267" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 4
"><a href="/grimgar-ao-anh-va-tro-tan-tap-4" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-123297" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="123297" tabindex="-1">
<input type="hidden" name="form_build_id" value="form-bxqhiZq2dw6V2GmJdqbn5ZhF1KnmrzGyME3KnGo4Huc" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_123297" tabindex="-1">
<input type="hidden" name="product-nid" value="123297" tabindex="-1">
<div class="form-actions form-wrapper form-group" id="edit-actions--31"><div class="uc-out-of-stock-instock"
                                                                             style="display: block;">41</div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-123297" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-123297">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-12 views-row-even views-row-last slick-slide" data-slick-index="11"
                         aria-hidden="true" style="width: 244px;" tabindex="-1" role="option"
                         aria-describedby="slick-slide011">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-3" tabindex="-1"><img class="img-responsive"
                                                                                           data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/3_43.jpg?itok=cTUB1sRh"
                                                                                           src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                                                           width="185" height="277"
                                                                                           alt=""><noscript><img
                class="img-responsive"
                src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/3_43.jpg?itok=cTUB1sRh"
                width="185" height="277" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 3
"><a href="/grimgar-ao-anh-va-tro-tan-tap-3" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="uc-catalog-buy-it-now-form-91339" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="91339" tabindex="-1">
<input type="hidden" name="form_build_id" value="form-XtDvwsnFsPf2PU-YNNx_pfZ5wG1v0N7lVBNc-QYy3pM" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_91339" tabindex="-1">
<input type="hidden" name="product-nid" value="91339" tabindex="-1">
<div class="form-actions form-wrapper form-group" id="edit-actions--32"><div class="uc-out-of-stock-instock"
                                                                             style="display: none;"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="edit-submit-91339" name="op" value="Mua ngay" tabindex="-1" style="display: none;">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"><span class="out-of-stock het-hang"><i class="fa fa-shopping-cart"
                                                                            title="Hết hàng"></i></span></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-91339">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-1 views-row-odd views-row-first slick-slide slick-cloned"
                         data-slick-index="12" aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-ban-pho-thong"
                                tabindex="-1"><img class="img-responsive"
                                                   data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/9_92.jpg?itok=UCh_yxPu"
                                                   src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                   width="185" height="266" alt=""><noscript><img class="img-responsive"
                                                                                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/9_92.jpg?itok=UCh_yxPu"
                                                                                                  width="185"
                                                                                                  height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 9 (Tặng 01 bookmark) - Bản
Phổ Thông
"><a href="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-ban-pho-thong"
     tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="680596"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-QPhMw7pm7FPcmqPmI1QjKgJ4SDXzzvlfLw4DckVUOZI" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_680596" tabindex="-1">
<input type="hidden" name="product-nid" value="680596" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-680596">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-2 views-row-even slick-slide slick-cloned" data-slick-index="13"
                         aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-8-tang-01-bookmark-ban-pho-thong"
                                tabindex="-1"><img class="img-responsive"
                                                   data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8_89.jpg?itok=8b7rzwiI"
                                                   src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                   width="185" height="266" alt=""><noscript><img class="img-responsive"
                                                                                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8_89.jpg?itok=8b7rzwiI"
                                                                                                  width="185"
                                                                                                  height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 8 (Tặng 01 bookmark) - Bản
Phổ Thông
"><a href="/grimgar-ao-anh-va-tro-tan-tap-8-tang-01-bookmark-ban-pho-thong"
     tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">81.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="580452"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-Af1_9xm3Kna0u1yDP8g-Xj0lGKGFrrdEJOLt5Lvjxtw" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_580452" tabindex="-1">
<input type="hidden" name="product-nid" value="580452" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-580452">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-3 views-row-odd slick-slide slick-cloned" data-slick-index="14"
                         aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-8-tang-01-bookmark-02-cuon-fanbook-ban-gioi-han"
                                tabindex="-1"><img class="img-responsive"
                                                   data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8-lmt_0.jpg?itok=tWZKP7Yb"
                                                   src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif"
                                                   width="185" height="266" alt=""><noscript><img class="img-responsive"
                                                                                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8-lmt_0.jpg?itok=tWZKP7Yb"
                                                                                                  width="185"
                                                                                                  height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 8 (Tặng 01 bookmark + 02 cuốn
fanbook ) - Bản Giới Hạn
"><a href="/grimgar-ao-anh-va-tro-tan-tap-8-tang-01-bookmark-02-cuon-fanbook-ban-gioi-han" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">81.000 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="580399"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-6W0uHGPj8f5xP-9GeRmUtr9im7c_Y4UOip0jRHipCFM" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_580399" tabindex="-1">
<input type="hidden" name="product-nid" value="580399" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-580399">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-4 views-row-even slick-slide slick-cloned" data-slick-index="15"
                         aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-2-tang-01-fanbook-cendres" tabindex="-1"><img
            class="img-responsive"
            data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/2_233.jpg?itok=B_01yNdk"
            src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif" width="185" height="266"
            alt=""><noscript><img class="img-responsive"
                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/2_233.jpg?itok=B_01yNdk"
                                  width="185" height="266" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 2 (Tặng 01 fanbook Cendres)
"><a href="/grimgar-ao-anh-va-tro-tan-tap-2-tang-01-fanbook-cendres" tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="582549"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-9ktmKIeNafKcgf5QlX1rL753jiddWQqsCJlg9BMfDIs" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_582549" tabindex="-1">
<input type="hidden" name="product-nid" value="582549" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-582549">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                    <div class="views-row views-row-5 views-row-odd slick-slide slick-cloned" data-slick-index="16"
                         aria-hidden="true" style="width: 244px;" tabindex="-1">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div
                                    class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="/grimgar-ao-anh-va-tro-tan-tap-1-tang-01-fanbook-fantaisie" tabindex="-1"><img
            class="img-responsive"
            data-src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/1_64.jpg?itok=Iz3FS9eb"
            src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif" width="185" height="267"
            alt=""><noscript><img class="img-responsive"
                                  src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/1_64.jpg?itok=Iz3FS9eb"
                                  width="185" height="267" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div
                    class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="Grimgar - Ảo ảnh và tro tàn - Tập 1 (Tặng 01 fanbook Fantaisie)
"><a href="/grimgar-ao-anh-va-tro-tan-tap-1-tang-01-fanbook-fantaisie"
     tabindex="-1">Grimgar - Ảo ảnh và tro ...</a></div></div>
	<div class="c-loop-authors-summary">Ao Jyumonji, Eiri Shirai </div>
	<div class="sanpham-giasp"><div class="gia-sell">76.500 đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed"
                                       action="/grimgar-ao-anh-va-tro-tan-tap-9-tang-01-bookmark-05-bao-li-xi-ban-gioi-han"
                                       method="post" id="" accept-charset="UTF-8"><div><input type="hidden" name="nid"
                                                                                              value="582519"
                                                                                              tabindex="-1">
<input type="hidden" name="form_build_id" value="form-dBwci4iOSxVHFyPb0Ncnmk_jzLF4TYjLSYo9ZeKeDNw" tabindex="-1">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_582519" tabindex="-1">
<input type="hidden" name="product-nid" value="582519" tabindex="-1">
<div class="form-actions form-wrapper form-group" id=""><div class="uc-out-of-stock-instock"></div><button
        title="Đặt hàng"
        class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed"
        type="submit" id="" name="op" value="Mua ngay" tabindex="-1">Thêm vào giỏ hàng</button><div
        class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-582519">
      <span class="flag flag-action flag-link-toggle"><a
              href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=node/680607"
              class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"
              tabindex="-1"></a></span>
    </span>
</div>
	</div>
</div></span></div>
                    </div>
                </div>
            </div>


            <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button"
                    style="display: block;">Next
            </button>
        </div>


    </div>
    </div>

@endsection
