<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class HomeController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function index()
    {
        $countries = Country::getCountries();
        $this->data['countries'] = $countries;
        return view('frontend/home', $this->data);
    }

}
