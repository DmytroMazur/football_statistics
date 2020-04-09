<?php 
namespace App\Traits;
use App\Country;
use App\City;

trait CountryCity {
 
    protected function getCountries(){

        return Country::all();
    
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