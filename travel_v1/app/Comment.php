<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = array('comment', 'user_id', 'city_id');

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
