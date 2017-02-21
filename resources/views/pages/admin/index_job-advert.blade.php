@extends('master')
@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
@stop
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="well bs-component">
          <fieldset>
            <legend>Огласи <a href="{{ route('admin.job-ad.new') }}" class="btn btn-primary">Нов Запис</a></legend>
            <table class="table" id="job-advert-table">
              <thead>
              <tr>
                <th>#</th>
                <th>Наслов</th>
                <th>Технологии</th>
                <th>Акции</th>
              </tr>
              </thead>
              <tbody></tbody>
            </table>
          </fieldset>
          @include('layouts.error')
          @include('layouts.flash')
        </div>
      </div>
    </div>
  </div>
@stop
@section('javascripts')
  <script>var route = '{{ route('admin.job-ad.ajaxData') }}';</script>
  <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/pages/js/index_job-advert.js') }}"></script>
@stop
