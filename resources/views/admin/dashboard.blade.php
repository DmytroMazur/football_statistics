@extends('admin.index')

@section('content')

     
  <!-- /#wrapper -->

  <!-- Menu Toggle Script -->
  <script>

    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  
  </script>
@endsection
