<?php 
namespace App\Http\Traits;
trait ExecApiStatistics {
 
    public function exec($customUrl=null,$params=array()){
        
        $ch = curl_init();
        $headers = array(
            'X-Auth-Token:'.config('api.api_token'),        
        );
        $url = config('api.api_url').$customUrl.$params;
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        
        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resultApi = curl_exec($ch);

        curl_close ($ch);
        
        return json_decode($resultApi);
    }
}