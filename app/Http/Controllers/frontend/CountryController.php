<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CountryCity;

class CountryController extends Controller
{
    use CountryCity;

    public function index(){
        dd($this->getCities());
    }
}
