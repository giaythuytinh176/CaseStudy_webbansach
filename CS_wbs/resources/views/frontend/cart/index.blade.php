 @extends('frontend.master2')
@section('content')

    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="{{ route('cart.index') }}" class="active">Giỏ Hàng</a></li>
        </ol>
    </div>
    <div class="row">


        <section class="col-sm-12">

            <!--// Old breadcrumb here -->
            <a id="main-content"></a>
            <h1 class="page-header">Giỏ hàng</h1>
            <div class="region region-content">
                <section id="block-system-main" class="block block-system clearfix">
                    @if (\Illuminate\Support\Facades\Session::has('sucess_cart'))
                        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('sucess_cart') }}</div>
                    @endif
                    @if (\Illuminate\Support\Facades\Session::has('remove_cart'))
                        <div class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('remove_cart') }}</div>
                    @endif
                    <div id="cart-form-pane">
                        <div class="soluong-sanpham">Số sản phẩm: <span class="number-sanpham">{{ Cart::content()->count() }} sản phẩm</span></div>
                        <form action="{{ route('cart.main') }}" method="post" id="uc-cart-view-form" accept-charset="UTF-8">
                            @csrf
                            <div>
                                <div class="uc-default-submit">
                                    <button type="submit" id="edit-update" name="updatecart" value="update_cart" class="btn btn-info form-submit">
                                        <span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span> Cập nhật giỏ hàng
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped sticky-enabled">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th></th>
                                            <th>Thành tiền</th>
                                            <th><abbr title="Số lượng">Số lượng</abbr></th>
                                            <th>Xoá</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
                                            <tr>
                                                <td class="image">
                                                    <a href="{{ route('showbookdetail', $cart->id) }}"><img class="img-responsive" data-src="{{ asset('images/'.$cart->options->img) }}" src="https://nxbkimdong.com.vn/sites/all/modules/lazyloader/image_placeholder.gif" width="195" height="300" alt=""/>
                                                        <noscript>
                                                            <img class="img-responsive" src="{{ asset('images/'.$cart->options->img) }}" width="195" height="300" alt=""/>
                                                        </noscript>
                                                    </a></td>
                                                <td>
                                                    <a href="{{ route('showbookdetail', $cart->id) }}" title="Xem chi tiết sách" class="cart-title-product">
                                                        <strong>{{ $cart->name }}
                                                        </strong></a></td>
                                                <td>
                                                    <ul class="text-center">
                                                        <li><span class="line-through">{{ number_format($cart->price * $cart->qty * 1.2 ) }}đ</span>
                                                        </li>
                                                        <li><h5><strong>{{ Cart::subtotal() }}</strong></h5>
                                                        </li>
                                                        <li><span class="percent">10 %</span></li>
                                                    </ul>
                                                </td>
                                                <td class="qty">
                                                    <div class="form-item form-item-items-0-qty form-type-uc-quantity form-group">
                                                        <input type="tex" id="edit-items-0-qty" name="items[{{ $cart->id }}][qty]" value="{{ $cart->qty }}" size="5" maxlength="6" class="form-text required"/>
                                                        <label class="control-label element-invisible" for="edit-items-0-qty">Số lượng
                                                            <span class="form-required" title="Trường dữ liệu này là bắt buộc.">*</span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="remove">
                                                    <button type="submit" onclick="return confirm('Are you sure want to delete?')" id="edit-items-0-remove" name="remove_cart" value="{{ $cart->id }}" class="btn btn-danger form-submit">
                                                        Xoá
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">Cart is empty.</td>
                                            </tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="5" class="subtotal"><span><h5>Số tiền đã được giảm:</span>
                                                {{ Cart::tax() }} đ</h5>
                                                <span id="subtotal-title">TỔNG SỐ TIỀN: </span><span class="uc-price">
                                                <br>{{ Cart::subtotal() }}
                                            </span>
                                                <span class="price-suffixes">  đ </span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="entity entity-uc-cart-item uc-cart-item-uc-cart-item clearfix">

                                    <h2>
                                    </h2>
                                </div>
                                <div class="form-actions form-wrapper form-group" id="edit-actions">
                                    {{--                                <button type="submit" id="edit-continue-shopping" name="op" value="Chọn thêm" class="btn btn-success form-submit">--}}
                                    {{--                                    <span class="icon glyphicon glyphicon-plus" aria-hidden="true"></span> Chọn thêm--}}
                                    {{--                                </button>--}}
                                    <button type="submit" id="edit-empty" onclick="return confirm('Are you sure want to delete?')" name="op" value="deletecarts" class="btn btn-default form-submit">
                                        Làm trống giỏ hàng
                                    </button>
                                    <button type="submit" id="edit-update" name="updatecart" value="update_cart" class="btn btn-info form-submit">
                                        <span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span> Cập nhật
                                        giỏ hàng
                                    </button>
                                    <button type="submit" id="edit-checkout--2" name="op" value="Thanh toán" class="btn btn-default form-submit">
                                        Thanh toán
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </section>


    </div>

@endsection

