@extends('master')
@section('content')
  @include('layouts.flash')
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="well bs-component">
          <fieldset>
            <legend>Огласи за вработување</legend>
            @foreach($jobAds as $ad)
              <div class="col-xs-12 col-md-4 col-lg-3">
                <div class="job-ad">
                  <p><b>{{ $ad->subject }}</b></p>
                  {!!  str_limit($ad->description, 40, '...') !!}
                  <p>{{ $ad->getNamesOfSKills() }}</p>
                  <hr>
                  @if(Auth::check())
                    @if(Auth::user()->isStudent())
                      <a href="{{ route('user.job-ad.apply', [$ad->id]) }}" class="btn btn-primary">Аплицирај</a>
                    @endif
                  @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Аплицирај</a>
                  @endif
                </div>
              </div>
            @endforeach
          </fieldset>
        </div>
      </div>
    </div>
  </div>
@stop
