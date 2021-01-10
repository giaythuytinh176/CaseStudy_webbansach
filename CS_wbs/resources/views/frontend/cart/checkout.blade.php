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
            <h1 class="page-header">Thanh toán</h1>
            <div class="region region-content">
                <section id="block-system-main" class="block block-system clearfix">


                    <form class="uc-cart-checkout-form" action="{{ route('cart.checkout.send') }}" method="post" id="uc-cart-checkout-form" accept-charset="UTF-8">
                        @csrf
                        <div><input type="hidden" name="form_id" value="uc_cart_checkout_form">
                            <!-- very important!!! -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <fieldset class="panel panel-default form-wrapper" id="billing-pane">
                                        <legend class="panel-heading">
                                            <span class="panel-title fieldset-legend"><i class="fa fa-home" aria-hidden="true"></i> Thông tin hóa đơn</span>
                                        </legend>
                                        <div class="panel-body">
                                            <div class="help-block">Nhập địa chỉ ghi hóa đơn và các thông tin cần thiết
                                                khác ở đây.
                                            </div>
                                            <div id="billing-address-pane">
                                                <div class="address-pane-table">
                                                    <table>
                                                        <tbody>
                                                        <tr class="field-billing_first_name">
                                                            <td class="field-label">
                                                                <span class="form-required">*</span> Tên:
                                                            </td>
                                                            <td class="field-field">
                                                                <div class="form-item form-item-panes-billing-address-billing-first-name form-type-textfield form-group">
                                                                    <input class="form-control form-text required" type="text" id="edit-panes-billing-address-billing-first-name" name="first_name" value="{{ $customer->first_name}}" size="32" maxlength="128" required="required">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="field-billing_last_name">
                                                            <td class="field-label">
                                                                <span class="form-required">*</span> Họ:
                                                            </td>
                                                            <td class="field-field">
                                                                <div class="form-item form-item-panes-billing-address-billing-last-name form-type-textfield form-group">
                                                                    <input class="form-control form-text required" type="text" id="edit-panes-billing-address-billing-last-name" name="last_name" value="{{ $customer->last_name}}" size="32" maxlength="128" required="required">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="field-billing_ucxf_checkout_email">
                                                            <td class="field-label">
                                                                <span class="form-required">*</span> Email:
                                                            </td>
                                                            <td class="field-field">
                                                                <div class="form-item form-item-panes-billing-address-billing-ucxf-checkout-email form-type-textfield form-group">
                                                                    <input class="form-control form-text required" type="text" id="edit-panes-billing-address-billing-ucxf-checkout-email" name="email" value="{{ $customer->email}}" size="32" maxlength="255" required="required">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="field-billing_phone">
                                                            <td class="field-label">
                                                                <span class="form-required">*</span> Điện thoại:
                                                            </td>
                                                            <td class="field-field">
                                                                <div class="form-item form-item-panes-billing-address-billing-phone form-type-textfield form-group">
                                                                    <input class="form-control form-text required" type="text" id="edit-panes-billing-address-billing-phone" name="phone" value="{{ $customer->phone}}" size="32" maxlength="128" required="required">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="field-billing_street1">
                                                            <td class="field-label">
                                                                <span class="form-required">*</span> Địa chỉ:
                                                            </td>
                                                            <td class="field-field">
                                                                <div class="form-item form-item-panes-billing-address-billing-street1 form-type-textfield form-group">
                                                                    <input class="form-control form-text required" type="text" id="edit-panes-billing-address-billing-street1" name="address" value="{{ $customer->address}}" size="32" maxlength="128" required="required">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="address-form-bottom">
                                                    <input type="hidden" name="panes[billing][address][billing_aid]" value="-4">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="panel panel-default form-wrapper" id="delivery-pane">
                                        <legend class="panel-heading">
                                            <span class="panel-title fieldset-legend">Thông tin giao hàng</span>
                                        </legend>
                                        <div class="panel-body">
                                            <div class="form-item form-item-panes-delivery-copy-address form-type-checkbox checkbox">
                                                <label class="control-label" for="edit-panes-delivery-copy-address"><input type="checkbox" id="edit-panes-delivery-copy-address" name="panes[delivery][copy_address]" value="1" checked="checked" class="form-checkbox ajax-processed">Thông
                                                    tin ghi hóa đơn và thông tin giao hàng của tôi là một.</label>
                                            </div>
                                            <div id="delivery-address-pane">
                                                <div class="address-pane-table">
                                                    <table>
                                                    </table>
                                                </div>
                                                <div class="address-form-bottom"></div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-8 pl-0 pr-0">
                                    <div class="col-xs-12 col-sm-6">
                                        <fieldset class="panel panel-default form-wrapper" id="quotes-pane">
                                            <legend class="panel-heading">
                                                <span class="panel-title fieldset-legend"><i class="fa fa-fighter-jet" aria-hidden="true"></i> Hình thức vận chuyển</span>
                                            </legend>
                                            <div class="panel-body">
                                                <div class="help-block">Báo giá giao hàng được tạo tự động khi bạn nhập
                                                    địa chỉ của mình.
                                                </div>
                                                <input type="hidden" name="panes[quotes][uid]" value="0">
                                                <button type="submit" id="edit-panes-quotes-quote-button" name="op" value="Bấm để tính vận chuyển" class="btn btn-default form-submit ajax-processed">
                                                    Bấm để tính vận chuyển
                                                </button>
                                                <div id="quote">
                                                    <input type="hidden" name="panes[quotes][quotes][flatrate_2---0][rate]" value="35000">
                                                    <input type="hidden" name="panes[quotes][quotes][quote_option]" value="flatrate_2---0">
                                                    Vận chuyển trực tiếp trong 48h – Huyện/ Xã Hà Nội, Tp.HCM: Freeship
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <fieldset class="panel panel-default form-wrapper" id="payment-pane">
                                            <legend class="panel-heading">
                                                <span class="panel-title fieldset-legend"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Phương thức thanh toán</span>
                                            </legend>
                                            <div class="panel-body">
                                                <div class="help-block">Chọn phương thức thanh toán từ các tùy chọn
                                                    sau.
                                                </div>
                                                <div class="form-item form-item-panes-payment-payment-method form-type-radios form-group">
                                                    <div id="edit-panes-payment-payment-method" class="form-radios">
                                                        <div class="form-item form-item-panes-payment-payment-method form-type-radio radio">
                                                            <label class="control-label" for="edit-panes-payment-payment-method-cod"><input type="radio" id="edit-panes-payment-payment-method-cod" name="panes[payment][payment_method]" value="cod" checked="checked" class="form-radio ajax-processed">Trả
                                                                tiền khi nhận hàng</label>
                                                        </div>
                                                        <div class="form-item form-item-panes-payment-payment-method form-type-radio radio">
                                                            <label class="control-label" for="edit-panes-payment-payment-method-vinno-momo"><input type="radio" id="edit-panes-payment-payment-method-vinno-momo" name="panes[payment][payment_method]" value="vinno-momo" class="form-radio ajax-processed">
                                                                <div title="Thanh toán qua cổng thanh toán Momo" class="icon-payment-label">
                                                                    <div>
                                                                        <img class="payment-icon img-responsive" src="https://nxbkimdong.com.vn/sites/all/modules/vinno/vinno_momo/image/icon_gateway.png" alt="">
                                                                    </div>
                                                                    <div>
                                                                        Ví điện tử MoMo<br><img class="vinno-momo-logo img-responsive" src="https://nxbkimdong.com.vn/sites/all/modules/vinno/vinno_momo/momo.png" alt="">
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="form-item form-item-panes-payment-payment-method form-type-radio radio">
                                                            <label class="control-label" for="edit-panes-payment-payment-method-nganluong"><input type="radio" id="edit-panes-payment-payment-method-nganluong" name="panes[payment][payment_method]" value="nganluong" class="form-radio ajax-processed">
                                                                <div title="Thanh toán qua cổng thanh toán Ngan luong" class="icon-payment-label">
                                                                    <div>
                                                                        <img class="payment-icon img-responsive" src="https://nxbkimdong.com.vn/sites/all/modules/vinno/vinno_momo/image/icon_gateway.png" alt="">
                                                                    </div>
                                                                    <div>
                                                                        Ví điện tử NganLuong<br><img class="nganluong-logo img-responsive" src="https://nxbkimdong.com.vn/sites/all/modules/vinno/vinno_momo/momo.png" alt="">
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <label class="control-label element-invisible" for="edit-panes-payment-payment-method">Phương
                                                    thức thanh toán
                                                    <span class="form-required" title="Trường dữ liệu này là bắt buộc.">*</span></label>
                                            </div>
                                            <div id="payment-details" class="clearfix payment-details-cod"><p>Khách hàng
                                                    trả tiền cho nhân viên giao nhận.</p></div>
                                    </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12">
                                    <fieldset class="panel panel-default form-wrapper" id="comments-pane">
                                        <legend class="panel-heading">
                                            <span class="panel-title fieldset-legend"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ghi chú đơn hàng</span>
                                        </legend>
                                        <div class="panel-body">
                                            <div class="help-block">Nếu quý khách có nhu cầu viết hóa đơn vui lòng cho
                                                biết các thông tin sau:
                                                <ul>
                                                    <li>Tên Công ty</li>
                                                    <li>Địa chỉ công ty</li>
                                                    <li>Mã số thuế</li>
                                                    <li>Mã quà tặng vào ô ghi chú</li>
                                                </ul>
                                            </div>
                                            <div class="form-item form-item-panes-comments-comments form-type-textarea form-group">
                                                <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
                                                    <textarea class="form-control form-textarea" id="edit-panes-comments-comments" name="panes[comments][comments]" cols="60" rows="5"></textarea>
                                                    <div class="grippie"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="panel panel-default form-wrapper" id="cart-pane">
                                        <legend class="panel-heading">
                                            <span class="panel-title fieldset-legend"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Nội dung giỏ hàng</span>
                                        </legend>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="sticky-header" style="position: fixed; top: 0px; left: 581px; visibility: hidden;">
                                                    <thead style="">
                                                    <tr>
                                                        <th class="products">Sản phẩm</th>
                                                        <th class="qty"><abbr title="Số lượng">Số lượng</abbr></th>
                                                        <th class="price">Thành tiền</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                                <table class="cart-review table table-hover table-striped sticky-enabled tableheader-processed sticky-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="products">Sản phẩm</th>
                                                        <th class="qty"><abbr title="Số lượng">Số lượng</abbr></th>
                                                        <th class="price">Thành tiền</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse(Cart::content() as $cart)

                                                        <tr>
                                                            <td class="products">
                                                                <a href="/tu-sach-tuoi-tien-bi-mat-cua-ong-gia-noel-0">
                                                                    {{ $cart->name }}
                                                                </a>
                                                            </td>
                                                            <td class="qty">
                                                                {{ $cart->qty }} đ
                                                            </td>
                                                            <td class="price">
                                                            <span class="uc-price">
                                                                {{ number_format($cart->price) }} đ
                                                            </span>
                                                            </td>
                                                        </tr>

                                                    @empty
                                                        <tr>
                                                            Bạn chưa có sản phẩm nào.
                                                        </tr>

                                                   @endforelse
                                                            <tr class="subtotal">
                                                                <td colspan="3" class="subtotal">
                                                                    <span id="subtotal-title">Thành tiền: </span>
                                                                    <span class="uc-price">{{ number_format(str_replace(',', '', Cart::subTotal())) }} đ</span>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="line-items-div">
                                                <table id="uc-order-total-preview">
                                                    <tbody>
                                                    <tr class="line-item-subtotal">
                                                        <td class="title">Thành tiền :</td>
                                                        <td class="price"><span class="uc-price">{{ number_format(str_replace(',', '', Cart::subTotal())) }} đ</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="line-item-shipping">
                                                        <td class="title">Vận chuyển trực tiếp trong 48h – Huyện/ Xã Hà
                                                            Nội, Tp.HCM:
                                                        </td>
                                                        <td class="price"><span class="uc-price"> Freeship </span></td>
                                                    </tr>
                                                    <tr class="line-item-total">
                                                        <td class="title">Tổng giá trị đơn hàng:</td>
                                                        <td class="price"><span class="uc-price">{{ number_format(str_replace(',', '', Cart::subTotal()) + 30000) }} đ</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="panel panel-default form-wrapper" id="coupon-pane">
                                        <div class="panel-body">
                                            <div class="form-item form-item-panes-coupon-code form-type-textfield form-group">
                                                <label class="control-label" for="edit-panes-coupon-code">Coupon
                                                    Code</label>
                                                <input class="form-control form-text" type="text" id="edit-panes-coupon-code" name="panes[coupon][code]" value="" size="25" maxlength="128" placeholder="Mã giảm giá">
                                            </div>
                                            <button type="submit" id="edit-panes-coupon-apply" name="uc-coupon-apply" value="Áp dụng cho đơn hàng" class="btn btn-info form-submit ajax-processed">
                                                Áp dụng cho đơn hàng
                                            </button>
                                            <div id="coupon-messages"></div>
                                        </div>
                                    </fieldset>
                                    <div class="form-actions form-wrapper form-group" id="edit-actions">
                                        <button type="submit" id="edit-continue" name="op" value="ĐẶT MUA" class="btn btn-default form-submit">
                                            ĐẶT MUA
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            </form>
        </section>
    </div>
    </section>


    </div>

@endsection

