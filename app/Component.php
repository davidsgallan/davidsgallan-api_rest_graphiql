<?php

namespace App;
use App\Constantes;

use Illuminate\Http\Request;

class Component
{

    public static function authenticator($tokenComp){

        if($tokenComp == Constantes::TOKEN){
            return true;
        }

    }
}
