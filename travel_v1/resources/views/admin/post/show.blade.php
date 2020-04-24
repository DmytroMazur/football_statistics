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

{{ Form::open(array('route' => 'store_post')) }}

  {{ Form::label('title', 'Title') }}  
  
  @if(isset($post))
    {{ Form::text('title',  $post->title ) }}
    {{ Form::label('city', 'City') }} 
    {{ Form::select('city_id', $postSelect) }}
    <br/>
    {{ Form::label('short_description', 'Short description') }} 
    <textarea name="short_desription">{{ $post->short_description }}</textarea>
    <textarea class="summernote" name="description">{{ $post->description }}</textarea>

    @else

    {{ Form::text('title') }}
    {{ Form::label('city', 'City') }} 
    {{ Form::select('city_id', $postSelect) }}
    <br/> 
    {{ Form::label('short_description', 'Short description') }}
    <textarea name="short_desription"></textarea>
    <textarea class="summernote" name="description"></textarea>
  @endif
  
    {{-- {{ Form::text('description',  '<p>TEST </p>',array("class" => "summernote") ) }} --}} 

    {{ Form::submit('Guardar') }}
  
  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

{{ Form::close() }} 
  
<script> 

$(document).ready(function() {
    $('.summernote').summernote();
});

</script>

  

@endsection