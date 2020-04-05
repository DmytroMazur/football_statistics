@extends('admin.index')

@section('content')
<a class="btn btn-primary" href="{{ route('create_city') }}" role="button">Create</a>
<div class="container-fluid">
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Actions</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($cities as $city)
        <tr>
          <td> {{ $city->id }} </td>
          <td> {{ $city->name }} </td>
          <td><a class="btn btn-primary" href="{{ route('edit_city', ['id' =>  $city->id ]) }}" role="button">Edit</a> /  <a class="btn btn-primary destroy_city" href="{{ route('delete_city') }}" data-id="{{ $city->id }}" role="button">Borrar</a> </td>    
        </tr>
      @endforeach 
    </tbody>
  </table>
</div>

<script>
  $( document ).ready( function(){
    $(".destroy_city").click(function(e){
      e.preventDefault();
      
      url = "{{route('delete_city')}}";
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
          if(result === 'true') window.location.href = "{{route('city_index')}}";
        }
      });

    
    });
  });
 </script>
@endsection