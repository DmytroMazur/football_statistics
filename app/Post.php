<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = array('title','description', 'city_id');

    public function city(){
        return $this->belongsTo('App\City');
    }
}
