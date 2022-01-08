<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function bigsearch($query)
    {
        for ($x = 0 ; $x<=10;$x++) {
            $t[] = ["title"=>$query];
        }
     
         return ["data"=>$t];
    }
}
