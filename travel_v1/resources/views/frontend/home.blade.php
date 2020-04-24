@extends('frontend/index')

@section('content')
<div id="fh5co-wrapper">
    <div id="fh5co-page">
    <div class="fh5co-listing">
        <div class="container">
            <div class="row">
                @foreach ($countries as $country)
                    <div class="col-md-4 col-sm-4 fh5co-item-wrap">
                    <a class="fh5co-listing-item get_country" data-country = "{{ $country->country_name }}" data-toggle="modal" data-target="#getCities"> 
                            <img src="{{ asset('upload/frontend/img-1.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive">
                            <div class="fh5co-listing-copy">
                            <h2>{{ $country->country_name }}</h2>
                                <span class="icon">
                                    <i class="icon-chevron-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>   
                @endforeach
            {{-- <div class="col-md-4 col-sm-4 fh5co-item-wrap">
                    <a class="fh5co-listing-item">
                        
                        <img src="{{ asset('upload/frontend/img-1.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive">
                        <div class="fh5co-listing-copy">
                            <h2>Paris</h2>
                            <span class="icon">
                                <i class="icon-chevron-right"></i>
                            </span>
                        </div>
                    </a>
                </div> --}}
            {{-- <div class="col-md-4 col-sm-4 fh5co-item-wrap">
                    <a class="fh5co-listing-item">
                        <img src="{{ asset('upload/frontend/img-2.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive">
                        <div class="fh5co-listing-copy">
                            <h2>New York</h2>
                            <span class="icon">
                                <i class="icon-chevron-right"></i>
                            </span>
                        </div>
                    </a>
                </div> --}}    
            {{-- <div class="col-md-4 col-sm-4 fh5co-item-wrap">
                    <a class="fh5co-listing-item">
                        <img src="{{ asset('upload/frontend/img-3.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive">
                        <div class="fh5co-listing-copy">
                            <h2>London</h2>
                            <span class="icon">
                                <i class="icon-chevron-right"></i>
                            </span>
                        </div>
                    </a>
                </div> --}}    
                <!-- END 3 row -->

            {{--
                <div class="col-md-4 col-sm-4 fh5co-item-wrap">
                    <a class="fh5co-listing-item">
                        <img src="{{ asset('upload/frontend/img-4.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive">
                        <div class="fh5co-listing-copy">
                            <h2>Amsterdam</h2>
                            <span class="icon">
                                <i class="icon-chevron-right"></i>
                            </span>
                        </div>
                    </a>
                </div> --}}    
                
                <!-- END 3 row -->

            </div>
        </div>
    </div>


    <div class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 fh5co-news">
                    <h3>News</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <span class="fh5co-date">Sep. 10, 2016</span>
                                <h3>Newly done Bridge of London</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit!</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fh5co-date">Sep. 10, 2016</span>
                                <h3>Newly done Bridge of London</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit!</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fh5co-date">Sep. 10, 2016</span>
                                <h3>Newly done Bridge of London</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus reprehenderit!</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 fh5co-testimonial">
                    <img src="{{ asset('upload/frontend/cover_bg_1.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive mb20">
                    <img src="{{ asset('upload/frontend/cover_bg_1.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    
    

    <div class="modal fade" id="getCities" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cities</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            </div>
            
          </div>
        </div>
      </div>

</div>
<!-- END fh5co-page -->

</div>
<!-- END fh5co-wrapper -->

<!-- jQuery -->

<script>
    jQuery( document ).ready( function(){
        
        jQuery(".get_country").on('click',function(){
            url = "{{route('get-cities')}}";    
            contryName = $(this).attr('data-country');
            
            $.ajax({
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: {
                    contryName : contryName
                }, 
                success: function(result){
                    var result = JSON.parse(result);
                    $(".modal-body").html('');
                    $.each( result, function( key, value ) {
                        $(".modal-body").append('<a href="' + value.url + '">'+ value.name +'</a> <br/>');
                    });
                    
                },
                error: function(xhr, status, errors) {
                    var err = JSON.parse(xhr.responseText);
                    alert(err.errors);
                }
            });
        
        });
    });  
    
    </script>


<!-- End jQuery -->
@endsection
