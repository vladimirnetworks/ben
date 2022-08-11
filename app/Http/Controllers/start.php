<?php
namespace App\Http\Controllers;

use App\Models\domain;

class start extends Controller
{


    function __construct()
    {
       // parent::__construct();
       \DB::enableQueryLog();
       $this->domain()->cats_decoded;

    }



    public static $domain = null;

    static function domain()
    {
       
        if (self::$domain == null) {
           
            self::$domain = domain::whereDomain(hname())->first();
        }
        return self::$domain;
    }

}
