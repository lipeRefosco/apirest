<?php

namespace App\Domain\Interfaces;

interface Services
{
    public static function get();

    public static function post();

    public static function put();
    
    public static function delete();
}