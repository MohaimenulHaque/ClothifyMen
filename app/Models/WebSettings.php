<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSettings extends Model
{
    protected $fillable = [
        'website_name',
        'email',
        'contact',

        'logo',
        'favicon',
        
        'facebook_link',
        'instagram_link',
        'linkedin_link'
    ];
}
