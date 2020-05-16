<?php

namespace App\Traits;

use Ixudra\Curl\Facades\Curl;

trait Country
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('api.api_country');
    }

    function getCounties()
    {
        $eurCountries = Curl::to($this->apiUrl)
            ->get();
        return json_decode($eurCountries);

    }

}
