@extends('admin.index')

@section('content')
{{--<form action="{{ route('store_country') }}" method="post">
      <div class="form-group">
          <label for="exampleInputEmail1">Country</label>
          <input type="text" class="form-control" id="country" name="country" placeholder="Country">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      {{ csrf_field() }}
</form> --}}

{{ Form::open(array('route' => 'store_country')) }}

  {{ Form::label('country', 'Country') }}  
  
  @if(isset($country))
    {{ Form::text('country',  $country->country_name )  }}
  @else
    {{ Form::text('country')  }}
  @endif
  
  {{ Form::submit('Guardar') }}
  
  @error('country')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

{{ Form::close() }}

@endsection