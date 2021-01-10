@extends('frontend.master2')

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
	<div><div class="c-product-item--thumbnail-container">
	<div class="hovereffect">
		<div class="anh-sanpham">
<span>
<div class="anh-sanpham-moi"><a href="/vo-chong-lao-twit"><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/vo-chong-lao-twwit.jpg?itok=THfNSW3O" width="185" height="283" alt="" style="display: block;"><noscript><img class="img-responsive" src="https://nxbkimdong.com.vn/sites/default/files/styles/158_auto/public/vo-chong-lao-twwit.jpg?itok=THfNSW3O" width="185" height="283" alt=""/></noscript></a></div>
			<span class="onsale c-product-item--on-sale"><div class="sach-phantram-giamgia"><span>-10%</span></div></span>
</span>
        </div>
	</div>
</div>
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
