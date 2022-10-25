<?php


namespace App\Services\Consume;


use Illuminate\Support\Facades\Http;

class ApiExternos
{
    static function baseUrl()
    {
        return config('services.alfred.url') . $url;
    }
    static function basicPost($url, $data)
    {
        return self::post(self::baseUrl($url), $data);
    }
}
