@extends('frontend/index')

@section('content')

<div class="fh5co-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 fh5co-news">
                <h3>News</h3>
                <ul>
                    @foreach ($posts as $post)
                        <li>
                        <a href="{{ route('get-detail-post', ['cityName'=>$cityName, 'slug'=>$post->slug]) }}" >
                                <span class="fh5co-date">Sep. 10, 2016</span>
                                <h3>{{ $post->title }}</h3>
                                <p>{{ $post->short_description }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6 fh5co-testimonial">
                <img src="{{ asset('upload/frontend/cover_bg_1.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive mb20">
                <img src="{{ asset('upload/frontend/cover_bg_1.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co" class="img-responsive">
            </div>
        </div>
    </div>
</div>

@endsection