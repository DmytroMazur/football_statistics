<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CountryCity;

class HomeController extends Controller
{
    use CountryCity;

    protected $data;

    public function __construct()
    {
        $this->data = array();    
    }

    public function index(){
        
        $data = array();
        
        $countries = $this->getCountries();         
               
        $data['countries'] = $countries;
         
        return  view('frontend/home', $data);
    }

    public function getCities(Request $request){
        
        $cityName = $request->get("contryName");
        
        $cities = $this->getCountries($cityName);

        $cities->city->each(function ($item, $key) {
            $this->data[$key]['name'] = $item->name;
            $this->data[$key]['url'] = route('get-posts', $item->name);
        });
        
        return $this->data = json_encode($this->data);
        
    }
    

}
