@extends('master')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="well bs-component">
          <form class="form-horizontal" method="POST" action="{{ route('login.post') }}">
            <fieldset>
              <legend>Најава</legend>

              <div class="form-group">
                <label for="inputEmail"
                       class="col-lg-2 control-label">Емаил <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputEmail" placeholder="Email" type="text" name="email"
                         value="{{ old('email') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword"
                       class="col-lg-2 control-label">Лозинка <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputPassword"
                         placeholder="Лозинка" type="password"
                         name="password">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">Најава</button>
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