@extends('admin.index')

@section('content')
<a class="btn btn-primary" href="{{ route('create_post') }}" role="button">Create</a>
<div class="container-fluid">
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Actions</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td> {{ $post->id }} </td>
          <td> {{ $post->title }} </td>
          <td><a class="btn btn-primary" href="{{ route('edit_post', ['id' =>  $post->id ]) }}" role="button">Edit</a> /  <a class="btn btn-primary destroy_post" href="{{ route('delete_post') }}" data-id="{{ $post->id }}" role="button">Borrar</a> </td>    
        </tr>
      @endforeach 
    </tbody>
  </table>
</div>

<script>
  $( document ).ready( function(){
    $(".destroy_post").click(function(e){
      e.preventDefault();
      
      url = "{{route('delete_post')}}";
      cityId = $(this).attr("data-id");
    
      $.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {
          id:cityId
        }, 
        success: function(result){
          if(result === 'true') window.location.href = "{{route('post_index')}}";
        },
        error: function(xhr, status, errors) {
          var err = JSON.parse(xhr.responseText);
          alert(err.errors);
        }
      });

    });
  });
 </script>
@endsection