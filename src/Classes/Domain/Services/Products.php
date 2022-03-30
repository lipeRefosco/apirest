<?php

namespace App\Domain\Services;

use App\Domain\Interfaces\Services;
use App\Infra\Response;

class Products implements Services
{
    // O que fazer?
        // Ver o que o veio do request: 
            // Se for ouver dados no router...
                // codigo de manipulacao ....
            // se não é apenas uma consulta
                // codigo de exibicao .... 

    public static function get()
    {
        Response::json("alo");
    }

    public static function post()
    {

    }

    public static function put()
    {

    }

    public static function delete()
    {

    }

}