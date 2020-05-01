<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter';
    protected $fillable = ['email'];

    public static function checkNewsletterEmail($email)
    {
        return Newsletter::whereEmail($email)->first();
    }
}
