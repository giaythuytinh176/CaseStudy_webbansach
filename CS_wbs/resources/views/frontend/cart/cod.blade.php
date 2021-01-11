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
            <h1 class="page-header">Đặt hàng thành công!.</h1>
            <div class="region region-content">
                <section id="block-system-main" class="block block-system clearfix">
                    <div class="alert alert-sucess" >
                        Bạn đã đặt đơn hàng thành công. Ship bằng cách COD.
                    </div>
                </section>
            </div>
        </section>


    </div>

@endsection

