<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Http\Requests\StoreCountry;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $countries = $this->getCountries();
        
        return view('admin/country/index', ['countries' => $countries ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/country/show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountry $request)
    {
        $request->validated();

        $country = $request->get('country');

        Country::firstOrCreate(array(
            'country_name' => $country
            ) 
        );

        return redirect()->route('country_index');
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
        $country = $this->getCountry($id);

        return view('admin/country/show',['country' => $country]);
        
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
        $countryId = $request->get('id');
        $deleteCountry = $this->getCountry($countryId)->delete();
        
        if($deleteCountry) return 'true';
    
        return 'false';
    }

    public function getCountries(){
        
        return Country::all();
    
    }

    public function getCountry($id=NULL){
        
        if(!empty($id)) return Country::findOrFail($id);

        return false;
    }
}
