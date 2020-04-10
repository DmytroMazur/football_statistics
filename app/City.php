<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
class City extends Model
{
    protected $table = 'city';
    protected $fillable = array('name', 'country_id');
    public $timestamps = false;

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
    
}
