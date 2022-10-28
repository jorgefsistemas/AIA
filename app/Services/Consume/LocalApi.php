<?php


namespace App\Services\Consume;


use Illuminate\Support\Facades\Http;
use League\CommonMark\Extension\Attributes\Node\Attributes;
use Livewire\TemporaryUploadedFile;

class LocalApi
{
    private static function getToken()
    {
       return Http::asForm()->post('http://localhost:8000/api/login', [
            'email' => auth()->user()->email,
            'password' => 'admin',
        ])->json('token');
    }

    static function getMarcas(){
        return Http::withToken(self::getToken())
        ->get('http://localhost:8000/api/marca')
        ->json($key = null);
    }

    static function getModelos($marca){
        return Http::withHeaders(['Access-Control-Allow-Credentials'=>'true'])
        ->withToken(self::getToken())
        ->get('http://localhost:8000/api/modelo/'.$marca)
        ->json();
    }

    static function storeAutos($autos,TemporaryUploadedFile $fotografia){
        try {
           
            $storeautos=Http::
            attach('fotografia', file_get_contents($fotografia->getRealPath()), 'fotografia.jpg')
            ->post('http://localhost:8000/api/autos');
    
            //->attach('fotografia',file_get_contents($fotografia->getRealPath()), 'fotografia.jpg')
           
             dd($storeautos);
    
           
        } catch (\Throwable $th) {
           dd( $th);
        }
    }
}
