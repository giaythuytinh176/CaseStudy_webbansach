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
