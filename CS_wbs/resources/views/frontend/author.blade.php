@extends('frontend.master')
@section('content')

    <ol class="breadcrumb">
        <li><a href="/">Trang chủ</a></li>
        <li>Tác giả</li>
    </ol>
    @foreach($authors as $key => $val)
        <div
            class="view view-danhsach-tacgia view-id-danhsach_tacgia view-display-id-page view-dom-id-1cdefe30a844ed6167658db27056dd9b">

            <div class="view-content ">
                <div class="views-row views-row-1 views-row-odd views-row-first col-xs-12 col-sm-6">

                    <div class="views-field views-field-nothing">        <span class="field-content"><div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7">
		<a href="/francoize-boucher"><img class="img-responsive"
                                          src="https://nxbkimdong.com.vn/sites/default/files/styles/278_auto/public/francoize_boucher_f.jpg?itok=lC-WyzKP"
                                          width="278" height="207" alt="" style="display: block;"><noscript><img
                    class="img-responsive"
                    src="https://nxbkimdong.com.vn/sites/default/files/styles/278_auto/public/francoize_boucher_f.jpg?itok=lC-WyzKP"
                    width="278" height="207" alt=""/></noscript></a>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5">
		<div class="c-author-listing--details">
            <div class="c-author-listing--title" aria-label="Françoize Boucher">
                <span class="word1" aria-hidden="true">First Name: {{$val->first_name}}</span>
                <span class="word2 lastname" aria-hidden="true">Name:{{$val->last_name}}</span>
            </div>
			<div class="c-author-listing--subtitle">
				<div
                    class="view view-sachcua-tacgia view-id-sachcua_tacgia view-display-id-block_1 view-dom-id-a857a0396d33c416104040e3a159ed2b">
            <div class="view-header">
      <span class="views-label views-label-title">Tác giả của</span>
            </div>



      <div class="view-content ">
          <div>

  <div class="views-field views-field-title">
      <span class="field-content">
          <a href="/tai-sao-tre-con-sieu-pham">
              <div>Tại sao trẻ con thật siêu phàm?</div>
          </a>
      </span>
  </div>
        </div>
    </div>

</div>
			</div>


          </div>
	</div>
</div></span></div>
                </div>

            </div>
        </div>
    @endforeach

@endsection
