@extends('master')
@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
@stop
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="well bs-component">
          <form action="{{ route('admin.job-ad.new.create') }}" class="form-horizontal" method="POST">
            <fieldset>
              <legend>Нов Запис</legend>

              <div class="form-group">
                <label for="inputSubject"
                       class="col-lg-2 control-label">Наслов <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <input class="form-control" id="inputSubject" type="text" name="subject"
                         value="{{ old('subject') }}">
                </div>
              </div>
              <br>

              <div class="form-group">
                <label for="inputDescription"
                       class="col-lg-2 control-label">Опис <span
                      class="required">*</span></label>
                <div class="col-lg-10">
                  <textarea name="description" class="form-control" id="inputDescription" cols="30"
                            rows="10">{{ old('description') }}</textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="inputSkills" class="col-lg-2 control-label">Skills <span class="required">*</span></label>
                <div class="col-lg-10">
                  <select name="skill[]" id="inputSkills" multiple class="form-control">
                    @foreach($skills as $skill)
                      <option
                          @if(old('skill'))
                          {{ (!in_array($skill->id, old('skill'))) ?: 'selected' }}
                          @endif
                          value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">Зачувај</button>
                </div>
              </div>
              {{ csrf_field() }}
            </fieldset>
          </form>
          @include('layouts.error')
          @include('layouts.flash')
        </div>
      </div>
    </div>
  </div>
@stop
@section('javascripts')
  <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('description', {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
    });
  </script>
  <script>
    $('#inputSkills').chosen();
  </script>
@stop

