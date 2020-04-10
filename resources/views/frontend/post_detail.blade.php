@extends('frontend/index')

@section('content')
<div id="fh5co-contact" class="post_detail animate-box fadeInUp animated">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="section-title">{{ $post->title }}</h3>
                    <p>{!! $post->description !!}</p>
                    
                </div>
                
            </div>
        </form>
    </div>
</div>
@endsection