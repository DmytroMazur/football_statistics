<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post as AppPost;
use App\Traits\Post;
class PostController extends Controller
{
    use Post;
    
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
                
        $this->data['post'] = $post;

        return view('frontend/post_detail', $this->data);
    }
}
