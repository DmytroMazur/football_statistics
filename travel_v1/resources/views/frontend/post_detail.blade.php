@extends('frontend/index')

@section('content')
<div id="fh5co-contact" class="post_detail animate-box fadeInUp animated">
    <div class="container">       
        <div class="row">
            <div class="col-md-6">
                <h3 class="section-title">{{ $post->title }}</h3>
                <p>{!! $post->description !!}</p>
                <p> Comments: </p>
                <div class="comment_list"> 
                    @foreach($comments as $comment)
                        <div>  
                            <span> {{ $comment->user_name }} </span>
                            <p class="form-control" id="comment"> {{ $comment->comment }} </p> 
                        </div>
                    @endforeach
                </div>

                @if(Auth::check())
                
                <form action="{{ route('add-comment') }}" id="add_comment" method="post">
                    <div class="form-group">
                        <label for="comment_description">Comment</label>
                        <textarea class="form-control" id="comment_description" rows="3" data-city-id="{{ $post->city_id }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Add Comment</button>
                </form>
                
                @endif
            </div>
        </div>
    </div>
</div>
@endsection