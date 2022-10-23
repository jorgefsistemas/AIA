<?php


namespace App\Services\Consume;


use Illuminate\Support\Facades\Http;

class SicoveApi
{
    static function baseUrl($url)
    {
        return config('services.sicove.url') . '/v1/' . $url;
    }

    static function client()
    {
        $USERNAME = config('services.sicove.username');
        $PASSWORD = config('services.sicove.password');
        return Http::withBasicAuth($USERNAME, $PASSWORD);
    }

    static function basicGet($url)
    {
        return self::client()->get(self::baseUrl($url));
    }

    static function basicPost($url,$data)
    {
        return self::client()->post(self::baseUrl($url),$data);
    }

    static function tokenGet($url)
    {
        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTkxMDE5NmIyZTUwYTRkMTAxZDI2Yjc4MTJjYTViODk5Y2ZjZjU1YjBkNWNmNjI2MzQxODYyYzkzMGY3ZmJkZWY3MDM1YjM5YzJhM2E5MzYiLCJpYXQiOjE2MjUwMDE2MjQsIm5iZiI6MTYyNTAwMTYyNCwiZXhwIjoxNjU2NTM3NjI0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.EwYgF-CDUWykpI5w_8nhR-o9p8f_PK-dZsuGYUd9B5iYjq_7nOU8FXMZFWAO0dtGiZxGQioCbsOzy-9VKKsqySAeGYRzDTu91zf2K9BEAWDlpRuXYwdMv7_zkWOrRkCu-PqLsEEFOvM1zwISaLEIll_1n5MZbckqw03f5CepQOv59isALe2V1z6a_HVnfOT196g2ESrkwotih1BzYzwe8d3mussxwN2yRBQJ0kMHr3syyV8Zii5MHGtUW1QvlmQQehdz5QCPMoozk1nFGkQt967D-bO0E9az0UkeYSyixg0PC_pHIDu_aTktj2F4zBtUxaTWBAZiS3QRfuCW92hzN0X3m5AZd_E8mKSyntVnYlLv4zCJLpkbwohDPaq9IQXxOH05TjQrBluToGxD1nmgn-xy3kLVJ5TuCSE3GqoC-JxDXdAT765ff_RVBjExWmvrQVoJfh2oZ3fWNvUjbSNKj2VoPTJWIZM-c5OelT9mBxHgtfbP1CkyQQNywbutWyZ1ZaIgMMWvcNfI7fMzc6FzhmkBGzRQJ6XbAG5aUMq0ix9GuCtgK6n8jUD9m3ZQ8Y5fM-NAtAlmerV_2UPOsC2Fl9117P2aFC3Re49eUgbfB2tvcYnI8GxuAV__fHK4yJl1zyVPVqmVroPkt_0mdg3mBe9McvzjwbrzCvWnrWN0iWQ')
            ->get($url);

        return $response;
    }

    static function curp($curp)
    {
        return self::basicGet('consume/curp/' . $curp);
    }

    static function codigoPostal($cp)
    {
        return self::basicGet('consume/cp/' . $cp);
    }

    static function consultaPlaca($placa)
    {
        return self::basicGet('tramite?resumeplaca='.$placa);
    }
    static function consultaPlacaDetalle($placa)
    {
        return self::basicGet('tramite?de=resumen&re=all&tramite[placa]='.$placa);
    }

    static function cancelaPlaca($placa, $Oficio)
    {
        $data=['placa'  => $placa,
               'oficio' => $Oficio
                ];
        return self::basicPost('tramites-v2/cancelar',$data);
    }
    static function busquedaCanceladosPorPlaca($placa)
    {
        return self::basicGet('tramite?de=resumen&re=all&cancelado_tramite[placa]='.$placa);
    }


}
