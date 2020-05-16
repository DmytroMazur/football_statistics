@extends('admin.index')

@section('content')

{{ Form::open(array('route' => 'store_country')) }}

  {{ Form::label('country', 'Country') }}

  @if(isset($country))
    {{ Form::text('country',  $country->country_name )  }}
  @else
      <select name="country" class="form-control">
          @foreach ($countries as $country)
                  <option selected value="{{ $country->name }}">{{ $country->name }}</option>
          @endforeach
      </select>
  @endif

  {{ Form::submit('Guardar') }}

  @error('country')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

{{ Form::close() }}

@endsection
