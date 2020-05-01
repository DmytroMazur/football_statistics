<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Http\Controllers\frontend\PostController;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['name', 'country_id'];
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function postComments()
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'DESC');
    }

    public static function getCities()
    {
        return City::all();
    }

    public static function getCity($id)
    {
        return City::findOrFail($id);
    }
}
