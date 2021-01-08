@extends('frontend.master2')
@section('content')


    <div id="breadcrumb-kd">
        <ol class="breadcrumb">
            <li><a href="{{ route('show.home') }}">Trang chủ</a></li>
            <li>Tác giả</li>
        </ol>
    </div>
    <div class="row">
    @foreach($authors as $key => $val)
        <div
            class="view view-danhsach-tacgia view-id-danhsach_tacgia view-display-id-page view-dom-id-1cdefe30a844ed6167658db27056dd9b">

            <div class="view-content ">
                <div class="views-row views-row-1 views-row-odd views-row-first col-xs-12 col-sm-6">

                    <div class="views-field views-field-nothing">        <span class="field-content"><div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7">
		<a href="{{ route('show.authors', $val->id) }}"><img class="img-responsive"
                                                             src="{{ asset('images/'.$val->image) }}" width="278"
                                                             height="207" alt="" style="display: block;">
            <noscript>
                <img class="img-responsive" src="{{ asset('images/'.$val->image) }}" width="278" height="207" alt=""/>
            </noscript>
        </a>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5">
		<div class="c-author-listing--details">
            <div class="c-author-listing--title" aria-label="Françoize Boucher">
                <span class="word2 lastname" aria-hidden="true">{{$val->name}}</span>
            </div>
			<div class="c-author-listing--subtitle">
				<div
                    class="view view-sachcua-tacgia view-id-sachcua_tacgia view-display-id-block_1 view-dom-id-a857a0396d33c416104040e3a159ed2b">
            <div class="view-header">
            </div>



      <div class="view-content ">
          <div>



  <div class="views-field views-field-title">
      <span class="field-content">
              <div>
                  @php
                  if (!empty(App\Models\Author::find($val->id)->books()->first()->name)){
                          echo 'Tác giả của: '.'<br>'.'<a href="'.route('showbookdetail', App\Models\Author::find($val->id)->books()->first()).'">'.App\Models\Author::find($val->id)->books()->first()->name.'</a>';
                } else{
                                                echo "Tác giả không có sách nào.";
                }
                  @endphp
              </div>
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
    </div>
    <div class="text-center">{{ $authors->links( "pagination::bootstrap-4") }}</div>

@endsection
