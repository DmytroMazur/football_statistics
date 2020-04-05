@extends('admin.index')

@section('content')

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
      @foreach ($countries as $country)
        <tr>
          <th scope="row">{{ $country->id }}</th>
          <td> {{ $country->country_name }} </td>
        <td><a class="btn btn-primary" href="{{ route('edit_country', ['id' =>  $country->id ]) }}" role="button">Edit</a> /  <a class="btn btn-primary" id="destroy_country" href="{{ route('delete_country') }}" data-id="{{ $country->id }}" role="button">Borrar</a> </td>    
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
  $( document ).ready( function(){
    $("#destroy_country").click(function(e){
      e.preventDefault();
      
      url = "{{route('delete_country')}}";
      countryId = $("#destroy_country").attr("data-id");
      
      $.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {
          id:countryId
        }, 
        success: function(result){
          if(result === 'true') window.location.href = "{{route('country_index')}}";
        }
      });
    
    });
  });
 </script>
@endsection