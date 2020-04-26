<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = array('title','description', 'city_id', 'slug', 'short_description');

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

    public static function getPost($id){        
        return $this->findOrFail($id);
    }

    public static function getPosts($cityName = Null){
        
        if(!empty($cityName)) return City::with('posts')->where('name', $cityName)->first();
        
        return PostModel::all();
    }
    
}
