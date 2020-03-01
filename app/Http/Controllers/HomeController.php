<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\api\FootballApiController;
class HomeController extends Controller
{

    protected $footballApi;
    
    public function __construct(FootballApiController $footballApi)
    {
        $this->footballApi = $footballApi;
    }

    public function index(){
        
        $teams = $this->footballApi->getTeamsStatistics();
        dd($teams);
    }

}
