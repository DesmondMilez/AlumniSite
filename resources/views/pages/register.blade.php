@extends('master')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="well bs-component">
          <form class="form-horizontal" method="POST" action="{{ route('register.post') }}">
            <fieldset>
              <legend>Регистрација</legend>

              <div class="form-group">
                <label for="inputIndex"
                       class="col-lg-2 control-label">Индекс <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputIndex" type="text" name="index" value="{{ old('index') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail"
                       class="col-lg-2 control-label">Емаил <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputEmail" type="text" name="email" value="{{ old('email') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputName"
                       class="col-lg-2 control-label">Име <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputName" type="text" name="name" value="{{ old('name') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputSurename"
                       class="col-lg-2 control-label">Презиме <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputSurename" type="text" name="surename"
                         value="{{ old('surename') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword"
                       class="col-lg-2 control-label">Нова Лозинка <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputPassword" type="password" name="password">
                </div>
              </div>

              <div class="form-group">
                <label for="inputCPassword"
                       class="col-lg-2 control-label">Потврди Лозинка<span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputCPassword" type="password" name="password_confirmation">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">Зачувај</button>
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
