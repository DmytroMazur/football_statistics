<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\StoreNewsletter;
use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function storeNews(StoreNewsletter $storeNewsletter)
    {
        $email = $storeNewsletter->get('email');
        $checkEmail = Newsletter::checkNewsletterEmail($email);
        if (empty($checkEmail)) {
            Newsletter::create(
                array(
                    'email' => $email
                )
            );
            return response()->json('ok');
        }
        return response()->json('ko');
    }
}
