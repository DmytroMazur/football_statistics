<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsletter;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function storeNews(StoreNewsletter $storeNewsletter){
        
        $email = $storeNewsletter->get('email');
        
        $checkEmail = Newsletter::checkNewsletterEmail($email);
       
        if(empty($checkEmail)){
                Newsletter::create(array(
                    'email' => $email  
            ));
        
            return response()->json('ok');
        } 
        return response()->json('ko');
    }

}
