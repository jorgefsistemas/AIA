<?php

namespace App\Suports;

use App\Adapters\ConcesionAdapter;
use App\Models\Cita;
use App\Models\Tramite;

class Sesion
{
    static function placa($value = -1)
    {
        if ($value != -1) {
            session(['placa' => $value]);
        }

        if ($value == -1 and !session()->has('placa')) {
            abort(419);
        }

        return session('placa') ?? '';
    }

    static function serie($value = -1)
    {
        if ($value != -1) {
            session(['serie' => $value]);
        }

        // if ($value == -1 and !session()->has('serie')) {
        //     abort(419);
        // }

        return session('serie') ?? '';
    }

    static function curp($value = -1)
    {
        if ($value != -1) {
            session(['curp' => $value]);
        }

        // if ($value == -1 and !session()->has('curp')) {
        //     abort(419);
        // }

        return session('curp') ?? '';
    }

    static function lineaCaptura($value = -1)
    {
        if ($value != -1) {
            session(['lineaCaptura' => $value]);
        }

        // if ($value == -1 and !session()->has('lineaCaptura')) {
        //     abort(419);
        // }

        return session('lineaCaptura') ?? '';
    }

    static function concesion($value = -1): ConcesionAdapter
    {
        if ($value != -1) {
            $concesion = ConcesionAdapter::wherePlaca($value);
            session(['concesion' => $concesion]);
        }

        if ($value == -1 and !session()->has('concesion')) {
            abort(419);
        }

        $concesion = session('concesion');

        return $concesion;
    }

    static function citaOperacion($value = -1)
    {
        $cita = null;

        if ($value != -1) {
            session(['citaOperadorId' => $value]);
        }

        if ($value == -1 and !session()->has('citaOperadorId')) {
            abort(419);
        }

        $id = session('citaOperadorId');

        $cita = Cita::find($id);

        return  $cita;
    }
}
