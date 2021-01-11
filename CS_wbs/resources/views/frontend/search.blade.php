@extends('frontend.master2')
<<<<<<< HEAD
@section('content')
    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="/">Search</a></li>
        </ol>
    </div>
    <div class="region region-content">
        <section id="block-system-main" class="block block-system clearfix">


            <div class="view view-hieusach view-id-hieusach view-display-id-page view-dom-id-9bab71b493e2b30779312a850cc27e34 jquery-once-1-processed">
                <div class="view-header">
                    <h3>Kết quả tìm kiếm cho <span class="text-keyword">"TAKAGI"</span>: <span class="count-ketqua">13</span> kết quả</h3>    </div>



                <div class="view-content ">
                     @foreach($books as $book)

                        <div class="views-row views-row-2 views-row-even col-xs-6 col-sm-4 col-md-3 ds-sach-mobile">

                            <div class="views-field views-field-nothing">        <span class="field-content"><div class="spnew">
=======

@section('content')

    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="{{ route('show.home') }}">Trang chủ</a></li>
            <li><a href="/tim-kiem" class="active">Tìm kiếm</a></li>
        </ol>
    </div>
    <div class="container">
        <div class="region region-content">
            <section id="block-system-main" class="block block-system clearfix">
                <div class="view view-hieusach view-id-hieusach view-display-id-page view-dom-id-0424aa31c5385ff36f0eceecc8d0f2a3 jquery-once-1-processed">
                    <div class="view-header">
                        <h3>Kết quả tìm kiếm cho <span class="text-keyword">"{{ $search }}"</span>:
                            <span class="count-ketqua">{{ count($data) }}</span> kết quả</h3></div>
                    @forelse($data as $dt)
                        <div class="view-content ">
                            <div class="views-row views-row-1 views-row-odd views-row-first views-row-last col-xs-6 col-sm-4 col-md-3 ds-sach-mobile">

                                <div class="views-field views-field-nothing">        <span class="field-content"><div class="spnew">
>>>>>>> 3e355a71d215ea416b5b3bfb188ede0d1a690b68
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<span>
<<<<<<< HEAD
<div class="anh-sanpham-moi"><a href="{{route('showbookdetail',$book->id)}}"><img class="img-responsive" src="{{asset('images/'.$book->img)}}" width="185" height="260" alt="" style="display: block;"><noscript><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/1_274.jpg?itok=uPuOD2ab" width="185" height="260" alt="" /></noscript></a></div>
=======
<div class="anh-sanpham-moi"><a href="/vo-chong-lao-twit"><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/vo-chong-lao-twwit.jpg?itok=THfNSW3O" width="185" height="283" alt="" style="display: block;"><noscript><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/vo-chong-lao-twwit.jpg?itok=THfNSW3O" width="185" height="283" alt=""/></noscript></a></div>
>>>>>>> 3e355a71d215ea416b5b3bfb188ede0d1a690b68
			<span class="onsale c-product-item--on-sale"><div class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
        </div>
	</div>
</div>
<<<<<<< HEAD
<div class="c-product-item--title-container" title="Nhất quỷ nhì ma, thứ ba (vẫn là) Takagi - Tập 1
"><a href="{{route('showbookdetail',$book->id)}}">{{$book->name}}</a></div></div>
	<div class="sanpham-giasp"><div class="gia-sell">{{ number_format($book->price) }}đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="/tim-kiem?title=TAKAGI" method="post" id="uc-catalog-buy-it-now-form-690014" accept-charset="UTF-8"><div><input type="hidden" name="nid" value="690014">
<input type="hidden" name="form_build_id" value="form-A1i97WKbTYD5FWKzU34jcLP8tVAdu4vrh-EZ6RSDVzU">
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_690014">
<input type="hidden" name="product-nid" value="690014">
<div class="form-actions form-wrapper form-group" id="edit-actions--2"><div class="uc-out-of-stock-instock" style="display: block;">315</div><button title="Đặt hàng" class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit ajax-cart-processed" type="submit" id="edit-submit-690014" name="op" value="Mua ngay"></button><div class="uc_out_of_stock_html"></div>
</div></div></form></div>
		<div class="sanpham-yeuthich"><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-690014">
      <span class="flag flag-action flag-link-toggle"><a href="https://nxbkimdong.com.vn/modal_forms/nojs/login?destination=tim-kiem%3Ftitle%3DTAKAGI" class="ctools-use-modal ctools-modal-modal-popup-small init-modal-forms-login-processed ctools-use-modal-processed"></a></span>
    </span>
</div>
	</div>
</div></span>  </div>  </div>

                    @endforeach
                </div>






            </div>
        </section>
    </div>
@endsection


=======
<div class="c-product-item--title-container" title="{{ $dt->BooksName }}
"><a href="{{ route('showbookdetail', $dt->booksid) }}">{{ $dt->BooksName }}
</a></div></div>
	<div class="c-loop-authors-summary"><a href="/roald-dahl">Roald Dahl</a> </div>
	<div class="sanpham-giasp"><div class="gia-sell">{{ number_format($dt->price)  }} đ</div></div>
<div class="sanpham-giasp"><div class="gia-cost"></div></div>
	<div class="c-product-yeuthick-mua">
		<div class="sanpham-mua"><form class="ajax-cart-submit-form uc-out-stock-processed" action="{{ route('cart.add.store', $dt->booksid) }}"
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
                        </div>
                    @empty
                        <div class="alert alert-danger"> Không tìm thấy sản phẩm nào.</div>
                    @endforelse
                </div>


            </section>
        </div>
    </div>
@endsection
>>>>>>> 3e355a71d215ea416b5b3bfb188ede0d1a690b68
