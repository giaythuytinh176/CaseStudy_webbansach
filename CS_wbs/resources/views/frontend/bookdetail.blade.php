@extends('frontend.master2')

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
                                            $list_author_id = [];
                                            $author = $bookdetail->authors()->get();
                                            foreach ($author as $item) {
                                                $list_author_id[] = $item->id;
                                                $arr_author[] = '<a href="'.route('show.authors', $item->id).'">'.$item->name.'</a>';
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
                                            <div class="gia-sell">Giá bán: <span class="uc-price">{{ number_format($bookdetail->price) }}đ</span>

                                            </div>
                                            <div class="form-actions form-wrapper form-group" id="edit-actions--61">
                                                <form action="{{ route('cart.add.withquantity.store', $bookdetail->id) }}" method="post">
                                                    @csrf
                                                    <label for="quantity">Số lượng</label>
                                                    <input type="number" id="quantity" name="quantity" min="1" max="100" value="1">
                                                    <button type="submit" title="Mua ngay">MUA NGAY</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                        style=" display: block;">Previous
                </button>
                <div aria-live="polite" class="slick-list draggable">
                    @php
                        foreach ($list_author_id as $author_id) {
                            $relatedbook =\App\Models\Author::find($author_id)->books()->get();;
                            foreach ($relatedbook as $val){
                    @endphp

                    <div class="views-row views-row-2 views-row-even slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 244px;" tabindex="-1" role="option" aria-describedby="slick-slide01">

                        <div class="views-field views-field-nothing">        <span class="field-content"><div class="spnew">
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<!--<a href='<div class='sach-tacgia'>Nhiều tác giả</div>'>--><span>
<div class="anh-sanpham-moi"><a href="{{ route('showbookdetail', $val->id) }}" tabindex="0"><img class="img-responsive" src="{{asset('images/'.$val->img)}}" width="185" height="266" alt="" style="display: block;"><noscript><img class="img-responsive"
                                                                                                                                                                                                                                    src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/8_89.jpg?itok=8b7rzwiI"
                                                                                                                                                                                                                                    width="185" height="266"
                                                                                                                                                                                                                                    alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
            <!--</a>-->
        </div>
	</div>
</div>
<div class="c-product-item--title-container" title="{{ $val->name }}
    "><a href="{{ route('showbookdetail', $val->id) }}" tabindex="0">{{ $val->name }}</a></div></div>
	<div class="sanpham-giasp"><div class="gia-sell" style="color: red">{{ $val->price }}đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="{{ route('cart.add.store', $val->id) }}"
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
</div></span></div>
                    </div>

                    @php


                        }
                    }

                    @endphp

                </div>


                <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button"
                        style="display: block;">Next
                </button>
            </div>


        </div>
    </div>

@endsection
