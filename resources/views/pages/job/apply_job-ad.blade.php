@extends('master')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <fieldset>
          <legend>{{ $jobAd->subject }}</legend>
          <p>{!! $jobAd->description !!}</p>
        </fieldset>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
          <form class="form-horizontal" method="POST" action="{{ route('user.job-ad.apply.post') }}"
                enctype="multipart/form-data">
            <fieldset>
              <legend>Апликација за работа</legend>

              <div class="form-group">
                <label for="inputEmail"
                       class="col-lg-2 control-label">Емаил <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputEmail" type="text" name="email"
                         value="{{ $user->email }}" disabled>
                </div>
              </div>

              <div class="form-group">
                <label for="inputName"
                       class="col-lg-2 control-label">Име и презиме <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputName" type="text" name="email"
                         value="{{ $user->name }} {{ $user->surename }}" disabled>
                </div>
              </div>

              <div class="form-group">
                <label for="inputCV"
                       class="col-lg-2 control-label">CV <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input type="file" name="cv" id="inputCV" class="form-control">
                </div>
              </div>
              <input type="hidden" name="job_id" value="{{ $jobAd->id }}">

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">Аплицирај</button>
                </div>
              </div>
              {{ csrf_field() }}
            </fieldset>
            @include('layouts.error')
            @include('layouts.flash')
          </form>
        </div>
      </div>
    </div>
  </div>
@stop
