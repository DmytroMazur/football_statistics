<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Country;
use App\Http\Controllers\admin\CountryController;
use App\Http\Requests\StoreCity;
use App\Traits\CountryCity;

class CityController extends Controller
{
    use CountryCity;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::getCities();

        return view('admin/city/index',['cities'=> $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countrySelect = array();
        $allCoutries = Country::getCountries();
        
        foreach($allCoutries as $country ){
            $countrySelect[$country->id] = $country->country_name;
        }
        
        return view('admin/city/show', ['countrySelect' => $countrySelect]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCity $request)
    {
        $request->validated();
        
        $cityName = $request->get('city');
        $countryId = $request->get('country_id');
        
        City::firstOrCreate(array(
            'name' => $cityName,
            'country_id'   => $countryId 
            ) 
        );

        return redirect()->route('city_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countrySelect =array();
        
        $city = City::getCity($id);

        $countrySelect[$city->country->id] = $city->country->country_name; 
        
        $allCoutries = Country::getCountries();        
        
        foreach($allCoutries as $country ){
            if($country->id != $city->country->id){
                $countrySelect[$country->id] = $country->country_name;
            }
        }

        return view('admin/city/show', ['city' => $city, 'countrySelect' => $countrySelect]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cityId = $request->get('id');
        City::getCity($cityId)->delete();
        
        return 'true';
    }

}
