<?php

namespace App\Http\Livewire\Cancelacion;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Consume\SicoveApi;


class BusquedaMovimientos extends Component
{
    use WithFileUploads;
    public $placa;
    public $oficio;
    public $alert;

    public $cancelaciones = [];

    public function mount()
    {
        // $this->placa = strtoupper($this->placa);

    }
    //Listener
    protected $listeners = ['keydown_enter' => 'search'];
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
        return view('livewire.cancelacion.busqueda-movimientos', [
            'cancelaciones' =>  $this->cancelaciones
            ])
        ->extends('layouts.panel')->section('panel_content');
    }
    public function search()
    {

         $this->validate();
        try {
            $this->placa = strtoupper($this->placa);
            $datosplaca = SicoveApi::busquedaCanceladosPorPlaca($this->placa);
            if($datosplaca->serverError()){
                session()->flash('danger', 'Ocurrió el siguiente error de servidor, al realizar la consulta: '. $datosplaca->json()['error']);
                return redirect()->route('busqueda_movimientos', ['placa' => $this->placa, 'oficio'=> $this->oficio]);
            }
            if($datosplaca->clientError()){
                session()->flash('danger', 'Ocurrió el siguiente error del cliente al realizar la consulta: '. $datosplaca->json()['error']);
                return redirect()->route('busqueda_movimientos', ['placa' => $this->placa, 'oficio'=> $this->oficio]);
            }
            if($datosplaca->status () != 200){
                session()->flash('danger', 'Ocurrió el siguiente error al realizar la consulta: '. $datosplaca->json()['error']);
                return redirect()->route('busqueda_movimientos', ['placa' => $this->placa, 'oficio'=> $this->oficio]);
            }else{
            $this->cancelaciones= $datosplaca->json('data') ?? [];
            $this->oficio= $datosplaca->json('data')[0]['observacion_modificacion'];
            }
        } catch (\Throwable $th) {
            $this->cancelaciones = [];
        }
    }
}
