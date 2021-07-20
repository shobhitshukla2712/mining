<?php

return [

    /*
    |--------------------------------------------------------------------------
    | System wide constants declared here
    |--------------------------------------------------------------------------
    |
    |
    */

    'APP_NAME'      => 'Mining',
    'APP_URL'       => 'http://mining.com',

    'FROM_EMAIL'    => env('MAIL_USERNAME'),
    'SENDER_NAME'   => 'Mining',

    
    'APP_ENV'       => env('APP_ENV')
];

// You can use it like $value=\Config::get('constants.APP_NAME')