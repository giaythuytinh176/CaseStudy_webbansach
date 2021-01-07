@extends('frontend.master')
@section('content')


    <div id="thong-tin-tac-gia" class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="field field-name-field-tacgia-chandung field-type-image field-label-hidden">
                <div class="field-items">
                    <div class="field-item even">
                        <img class="img-responsive" src="{{ asset('images/'.$author_detail->image) }}" width="335" height="250" alt="" style="display: block;">
                    </div>
                </div>
            </div>
        </div>
        <div id="tac-gia-right" class="col-xs-12 col-sm-6 col-md-8 ">
            <div class="field field-name-field-tacgia-ten field-type-text field-label-hidden">
                <div class="field-items">
                    <div class="field-item even">{{ $author_detail->name }}</div>
                </div>
            </div>
            <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                <div class="field-items">
                    <div class="field-item even">
                        {!! $author_detail->description !!}
                        <br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
