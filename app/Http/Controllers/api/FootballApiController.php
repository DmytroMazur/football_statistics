<?php

namespace App\Http\Controllers\api;
use App\Http\Traits\ExecApiStatistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FootballApiController extends Controller
{
    use ExecApiStatistics;

    public function getTeamsStatistics(){
        $areasId = explode(',',config('api.areas_id'));
        $teamsStatistics = array();
        
        foreach($areasId as $areaId){
            
            $teamsArea = $this->exec('teams?areas=',$areaId);
            $teamsStatistics[] = $teamsArea->teams; 
        }
        
        return $teamsStatistics;
    }
}
