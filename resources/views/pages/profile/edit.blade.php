@extends('master')
@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
@stop
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="well bs-component">
          <form class="form-horizontal" method="POST" action="{{ route('user.profile.save') }}"
                enctype="multipart/form-data">
            <fieldset>
              <legend>Мој Профил</legend>

              <div class="form-group">
                <label for="inputIndex"
                       class="col-lg-2 control-label">Индекс <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputIndex" type="text" name="index" value="{{ $user->index }}"
                         disabled>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail"
                       class="col-lg-2 control-label">Емаил <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputEmail" type="text" name="email"
                         value="{{ old('email', $user->email) }}" disabled>
                </div>
              </div>

              <div class="form-group">
                <label for="inputName"
                       class="col-lg-2 control-label">Име <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputName" type="text" name="name"
                         value="{{ old('name', $user->name) }}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputSurename"
                       class="col-lg-2 control-label">Презиме <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputSurename" type="text" name="surename"
                         value="{{ old('surename', $user->surename) }}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputSmer" class="col-lg-2 control-label">Насока <span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="smer_id" id="inputSmer" class="form-control">
                    @foreach($smerovi as $smer)
                      <option
                          value="{{ $smer->id }}" {{ ($smer->id != $profile->smer_id) ?: 'selected' }}>{{ $smer->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputAvatar" class="col-lg-2 control-label">Аватар </label>
                <div class="col-lg-10">
                  <input type="file" class="form-control" name="avatar">
                  @if($profile->getRawAvatarName())
                    <img src="{{ $profile->avatar }}" alt="{{ $profile->getRawAvatarName() }}" style="float: left;">
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="inputSkills" class="col-lg-2 control-label">Skills <span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="skill[]" id="inputSkills" multiple class="form-control">
                    @foreach($skills as $skill)
                      <option
                          @if(in_array($skill->id,old('skill', $profile->Skills->lists('id')->toArray())))
                          selected
                          @endif
                          value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <br>
              <h4>За промена на лозинката:</h4>

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
                       class="col-lg-2 control-label">Потврди Лозинка <span
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
@section('javascripts')
  <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
  <script>
    $('#inputSkills').chosen();
  </script>
@stop
