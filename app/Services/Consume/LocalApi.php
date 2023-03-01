<?php


namespace App\Services\Consume;


// use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Http;
use League\CommonMark\Extension\Attributes\Node\Attributes;

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
    static function getAutos(){
        return Http::withHeaders(['Access-Control-Allow-Credentials'=>'true'])
        ->withToken(self::getToken())
        ->get('http://localhost:8000/api/autos')
        ->json();
    }

    static function storeAutos($autos,TemporaryUploadedFile $fotografia){
        try {
            $storeautos=Http::withHeaders([ 'Accept' => 'application/json'])
            ->withToken(self::getToken())
            ->attach('fotografia', file_get_contents($fotografia->getRealPath()), $fotografia->getClientOriginalName() )
            ->post('http://localhost:8000/api/autos', [
                    'marca' => $autos['marca'],
                    'modelo' =>  $autos['modelo'],
                    'anio' =>  $autos['anio'],
                    'precio' =>  $autos['precio'],
                    'kilometraje' =>  $autos['kilometraje'],
                    'color' =>  $autos['color'],
                    'email' =>  $autos['email'],
                    'telefono' =>  $autos['telefono'],
                   ]);
                   //dd( $storeautos->json() );
             return $storeautos;
        } catch (\Throwable $th) {
             return $th;
           //dd($th);
        }
    }
}
