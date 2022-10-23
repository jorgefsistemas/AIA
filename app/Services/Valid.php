<?php

namespace App\Services;



class Valid
{
    static function cp($string)
    {
        return strlen($string) == 5;
    }

    static function curp($string)
    {
        return strlen($string) == 18;
    }
    static function rfcMoral($string)
    {
        return strlen($string) == 12;
    }
}
