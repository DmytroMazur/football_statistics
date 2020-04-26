<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = array('country_name');

    public function city(){
        return $this->hasMany(City::class);
    }

    public static function getCountry($id=NULL){
        
        return Country::findOrFail($id);

    }

    public static function getCountries($countryName = NULL){

        if(!empty($countryName)) return Country::with('city')->where('country_name', $countryName)->first();
        
        return Country::with('city')->get();
    }
}
