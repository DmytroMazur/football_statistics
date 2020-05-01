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

    public function getCities(Request $request)
    {
        $cityName = $request->get("contryName");
        $cities = Country::getCountries($cityName);
        $cities->city->each(
            function ($item, $key) {
                $this->data[$key]['name'] = $item->name;
                $this->data[$key]['url'] = route('get-posts', $item->name);
            }
        );
        return json_encode($this->data);
    }

}
