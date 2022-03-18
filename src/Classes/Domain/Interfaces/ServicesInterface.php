<?php

namespace App\Domain\Interfaces;

interface ServicesInterface
{
    public static function get();

    public static function post();

    public static function put();
    
    public static function delete();
}