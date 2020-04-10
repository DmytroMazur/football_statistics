<?php 
namespace App\Traits;
use App\Country;
use App\City;

trait CountryCity {
 
    protected function getCountries($countryName = NULL){
        
        if(!empty($countryName)) return Country::with('city')->where('country_name', $countryName)->first();
        
        return Country::with('city')->get();
    }

    protected function getCities(){

        return City::all();
    
    }

    protected function getCity($id){
        
        return City::with('country')->findOrFail($id); 
    
    }

    public function getCountry($id=NULL){
        
        return Country::findOrFail($id);

    }
}