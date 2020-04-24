<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post as AppPost;
use App\Comment;
use App\City;
use App\Http\Requests\StoreComment;
use App\Traits\Post;
use App\Traits\CountryCity;

class PostController extends Controller
{
    use Post, CountryCity;
    
    protected $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function getCityPosts($cityName){
        
        $posts = $this->getPosts($cityName);
        
        $this->data['cityName'] = $cityName;

        $this->data['posts'] = $posts->posts;

        return view('frontend/post_list', $this->data);
    }

    public function getDetailPost($cityName ,AppPost $post){
        
        $comments = $this->getCityComments($post->city_id);
       
        $this->data['post'] = $post;
        $this->data['comments'] = $comments->postComments;

        return view('frontend/post_detail', $this->data);
    }

    public function addComment(StoreComment $storeComment){

        $comment = $storeComment->get('comment_description');
        
        $cityId = $storeComment->get('city_id');
        
        $userId = Auth::id();

        Comment::create(array(
            'comment' => $comment,
            'user_id' => $userId,
            'city_id' => $cityId
        ));
        
        return response()->json(array(
            'comment' => $comment,
            'userName' => Auth::user()->name,
            'message' => 'ok'
        ));

    }

    

}
