<?php

namespace App\Http\Livewire\Cancelacion;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Consume\SicoveApi;
use App\Models\Cancelacion\Cancelacion;



class BusquedaSabana extends Component
{
    use WithFileUploads;
    public $placa;
    public $oficio;
    public $alert;
    public $nucc;

    public $cancelaciones = [];

    public function mount()
    {
        // $this->placa = strtoupper($this->placa);

    }
    // rules
    public function rules()
    {
        return [
            'placa' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'placa.*' => 'Favor de verificar la placa.',
        ];
    }
    // menssages
    public function render()
    {
        return view('livewire.cancelacion.busqueda-sabana', [
            'cancelaciones' =>  $this->cancelaciones,
            'nucc' => $this->nucc
            ])
        ->extends('layouts.panel')->section('panel_content');
    }
    public function search()
    {
          $this->validate();
        try {
            $this->placa = strtoupper($this->placa);
            $datosplaca = SicoveApi::busquedaCanceladosPorPlaca($this->placa);
            // buscar usuario que  cancelo

            if($datosplaca->serverError()){
                session()->flash('danger', 'Ocurrió el siguiente error de servidor, al realizar la consulta: '. $datosplaca->json()['error']);
                return redirect()->route('busqueda_sabanas', ['placa' => $this->placa, 'oficio'=> $this->oficio]);
            }
            if($datosplaca->clientError()){
                session()->flash('danger', 'Ocurrió el siguiente error del cliente al realizar la consulta: '. $datosplaca->json()['error']);
                return redirect()->route('busqueda_sabanas', ['placa' => $this->placa, 'oficio'=> $this->oficio]);
            }
            if($datosplaca->status () != 200){
                session()->flash('danger', 'Ocurrió el siguiente error al realizar la consulta: '. $datosplaca->json()['error']);
                return redirect()->route('busqueda_sabanas', ['placa' => $this->placa, 'oficio'=> $this->oficio]);
            }else{
            $this->cancelaciones= $datosplaca->json('data') ?? [];
            $this->oficio= $datosplaca->json('data')[0]['observacion_modificacion'];
            $usuario_que_cancelo=Cancelacion::select('user_id')->where('placa',$this->placa )->get('user_id')->first();
            $nombre_usuario_cancelo=User::where('id', $usuario_que_cancelo['user_id'] )->get();
            $this->nucc=$nombre_usuario_cancelo[0]['nombre'].' '.$nombre_usuario_cancelo[0]['apellido1'].' '.$nombre_usuario_cancelo[0]['apellido2'];
            }
            $this->cancelaciones= $datosplaca->json('data') ?? [];
            $this->oficio= $datosplaca->json('data')[0]['observacion_modificacion'];
        } catch (\Throwable $th) {
            $this->cancelaciones = [];
        }
    }

}
