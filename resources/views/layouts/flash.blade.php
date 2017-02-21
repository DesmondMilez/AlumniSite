@if(Session::has('status') and Session::has('message'))
  <div class="form-group">
    <div class="alert alert-{{strtolower(Session::get('status'))}}">
      <p><b>{{ Session::get('status') }}! </b>{{ Session::get('message') }}</p>
    </div>
  </div>
@endif
