@extends('master')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="well bs-component">
          <form class="form-horizontal" method="POST">
            <fieldset>
              <legend>Контактирајте не</legend>

              <div class="form-group">
                <label for="inputEmail"
                       class="col-lg-4 control-label">Емаил <span
                      class="required">*</span></label>
                <div class="col-lg-8">
                  <input class="form-control" id="inputEmail" type="text" name="email"
                         value="{{ old('email', '') }}">
                </div>
              </div>

              {{ csrf_field() }}

              <div class="form-group">
                <label for="inputSubject"
                       class="col-lg-4 control-label">Наслов <span
                      class="required">*</span></label>
                <div class="col-lg-8">
                  <input class="form-control" id="inputSubject" type="text" name="subject"
                         value="{{ old('subject', '') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="inputContent"
                       class="col-lg-4 control-label"> <span
                      class="required">Порака *</span></label>
                <div class="col-lg-8">
                  <textarea name="content" id="inputContent" class="form-control"
                            rows="5">{!! old('content', '') !!}</textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-8 col-lg-offset-4">
                  <button type="submit" class="btn btn-primary">Испрати</button>
                </div>
              </div>
              @include('layouts.error')
              @include('layouts.flash')
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop

