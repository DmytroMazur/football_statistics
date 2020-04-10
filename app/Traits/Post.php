<?php 
namespace App\Traits;

use App\Post as PostModel;
use App\City;

trait Post {
 
    protected function getPosts($cityName = Null){
        
        if(!empty($cityName)) return City::with('posts')->where('name', $cityName)->first();
        
        return PostModel::all();
    }

    protected function getPost($id){
        
        return PostModel::findOrFail($id);
        
    }
}