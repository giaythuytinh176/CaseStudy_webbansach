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
		<div class='sanpham-mua'><form class="ajax-cart-submit-form" action="/sach-moi" method="post"
                                       id="uc-catalog-buy-it-now-form-714936" accept-charset="UTF-8"><div><input
                        type="hidden" name="nid" value="714936"/>
<input type="hidden" name="form_build_id" value="form-NWvgWAdM2aaGuaQgxT2nTuAVQRK4EFxAjQo944jHPUQ"/>
<input type="hidden" name="form_id" value="uc_catalog_buy_it_now_form_714936"/>
<input type="hidden" name="product-nid" value="714936"/>
<div class="form-actions form-wrapper form-group" id="edit-actions"><button title="Đặt hàng"
                                                                            class="list-add-to-cart ajax-cart-submit-form-button btn btn-default form-submit"
                                                                            type="submit" id="edit-submit-714936"
                                                                            name="op" value="Mua ngay">Mua ngay</button>
</div></div></form></div>
		<div class='sanpham-yeuthich'><span class="flag-wrapper flag-sach-yeuthich flag-sach-yeuthich-714936">
      <span class="flag flag-action flag-link-toggle"><a href="/user/login?destination=sach-moi"
                                                         class="ctools-use-modal ctools-modal-modal-popup-small">+ Thêm vào <b>Yêu thích</b></a></span>
    </span>
</div>
	</div>
</div></span></div>

                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                         {{ $books->links( "pagination::bootstrap-4") }}
                </div>
            </section>
        </div>
    </section>
    </div>


@endsection
