<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CountryCity;

class HomeController extends Controller
{
    use CountryCity;

    public function index(){
        
        $data = array();
        
        $countries = $this->getCountries();         
        
        $data['countries'] = $countries;
         
        return  view('frontend/home', $data);
    }

}
