@if(count($errors) > 0)
  <div class="form-group">
    <div class="alert alert-danger">
      @if($errors->has('status') or $errors->has('message'))
        <p><b>{{ $errors->first('status') }}! </b>{{ $errors->first('message') }}</p>
      @else
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
    </div>
  </div>
@endif

