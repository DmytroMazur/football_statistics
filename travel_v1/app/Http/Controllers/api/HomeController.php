<?php

namespace App\Http\Controllers\api;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected  $data;

    public function  __construct()
    {
        $this->data = [];
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
