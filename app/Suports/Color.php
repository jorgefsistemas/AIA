<?php

namespace App\Suports;

class Color
{
    static function generateBackAndBorderColor($des = 0.2){
        $r = rand(100,200);
        $g = rand(100,200);
        $b = rand(100,200);
        return ['rgba('.$r.', '.$g.', '.$b.', '.$des.')','rgba('.$r.', '.$g.', '.$b.')'];
    }

    static function generateColor()
    {
        return '#' . str_pad(dechex(rand(0xFF0000, 0x00FFFF)), 6, 0, STR_PAD_LEFT);;
    }
}
