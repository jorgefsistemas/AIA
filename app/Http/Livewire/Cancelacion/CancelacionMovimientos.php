<?php

namespace App\Http\Livewire\Cancelacion;
use App\Models\Tramite;
use App\Services\Valid;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Services\Consume\SicoveApi;


class CancelacionMovimientos extends Component
{
    use WithFileUploads;
    public $placa;
    public $oficio;
    public $oficio_confirmation;
    public $alert;
    protected $listeners = ['snapPhoto', 'snapPhotoTaken','snapPhotoOperador'];
    // rules
    public function rules()
    {
        return [
            'placa' => 'required|unique:cancelacions,placa',
            // 'oficio' => 'required|confirmed|unique:cancelacions,oficio',
        ];
    }
    public function messages()
    {
        return [
            'placa.required' => 'Favor de verificar la placa.',
            'placa.unique' => 'Favor de verificar la placa,  ya tiene cancelaciones.',
            // 'oficio.required' => 'Favor de verificar el oficio.',
            // 'oficio.confirmed' => 'Favor de confirmar el oficio.',
            // 'oficio.unique' => 'El oficio ya fue capturado en cancelaciones',
        ];
    }
    // menssages
    public function render()
    {
        return view('livewire.cancelacion.cancelacion-movimientos')->extends('layouts.panel')->section('panel_content');
    }
    public function submit()
    {
         $this->validate();
        try {
            DB::beginTransaction();
            $datosplaca = SicoveApi::consultaPlaca($this->placa);
            $this->placa= strtoupper($this->placa);
            $datos= $datosplaca->json();
            if(!$datos){
                session()->flash('danger', 'Ocurrió un error con la conexión al servicio de consulta');
                return false;
            }
            if($datos['code'] != 200){
                 return session()->flash('danger', 'No existe trámite para la siguiente placa: '.$this->placa);
            }
            $datos = [ $this->placa, $this->oficio,];
            return redirect()->route('placa', ['placa'=> $this->placa, 'oficio'=>$this->oficio]);
            //pendiente de operadores
            DB::commit();
            session()->flash('success', 'La información se guardó correctamente');
            return redirect()->route('home');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('danger', 'Ocurrió un error al guardar' . $th->getMessage());
            return false;
        }
    }
}
