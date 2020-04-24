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

{{ Form::open(array('route' => 'store_city')) }} 
 
@if(isset($city))
    {{ Form::label('city', 'City') }}   
    {{ Form::text('city',  $city->name )  }}  <br/>
    {{ Form::label('country', 'Country') }} 
    {{-- {{ Form::text('country_id',  $city->country->country_name )  }} <br/> --}}
    {{ Form::select('country_id', $countrySelect) }}
@else
    {{ Form::label('city', 'City') }}   
    {{ Form::text('city')  }}
    {{ Form::label('country', 'Country') }} 
    {{ Form::select('country_id', $countrySelect) }}
@endif
  
  {{ Form::submit('Guardar') }}
  
  @error('city')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

{{ Form::close() }}

@endsection