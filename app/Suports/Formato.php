<?php

namespace App\Suports;

class Formato
{
    static function sexoCvTaxi($sexo)
    {
        return $sexo == 'H' ? 1 : 0;
    }

    static function sexoRenapo($sexo)
    {
        return $sexo == 1 ? 'H' : 'M';
    }

    static function fechaDMY($dia)
    {
        return date("d/m/Y", strtotime($dia));
    }

    static function fechaYMD($dia)
    {
        if (str_contains($dia, '/')) {
            $split = explode('/', $dia);
            return $split[2] . '-' . $split[1] . '-' . $split[0];
        }

        return date("Y-m-d", strtotime($dia));
    }
}
