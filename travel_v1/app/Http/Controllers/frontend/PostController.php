<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\City;
use App\Http\Requests\StoreComment;



class PostController extends Controller
{
    
    
    protected $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function getCityPosts($cityName){
        
        $posts = Post::getPosts($cityName);
        
        $this->data['cityName'] = $cityName;

        $this->data['posts'] = $posts->posts;

        return view('frontend/post_list', $this->data);
    }

    public function getDetailPost($cityName ,Post $post){
        
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

    private function getCityComments($cityId){
        $comments = City::with('postComments')->find($cityId);
        
        $comments->postComments->each(function($item, $key) use($comments) {
            
            $comments->postComments[$key]->user_name = $item->with('user')->first()->user->name;
            
        });

        return $comments;
    }

    

}
