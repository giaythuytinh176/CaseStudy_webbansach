@extends('frontend.master2')
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
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<span>
<div class="anh-sanpham-moi"><a href="{{route('showbookdetail',$book->id)}}"><img class="img-responsive" src="{{asset('images/'.$book->img)}}" width="185" height="260" alt="" style="display: block;"><noscript><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/1_274.jpg?itok=uPuOD2ab" width="185" height="260" alt="" /></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
        </div>
	</div>
</div>
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


