<?php

namespace App\Http\Livewire\Registro;
use App\Models\Tramite;
use App\Services\Valid;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Services\Consume\SicoveApi;
use Illuminate\Support\Facades\Http;


class AltaRegistros extends Component
{
    use WithFileUploads;
    public $placa;
    public $oficio;
    public $oficio_confirmation;
    public $alert;
    protected $listeners = ['snapPhoto', 'snapPhotoTaken','snapPhotoOperador'];
    public $marca= [];


    public function mount()
    {
        $token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY2NTcyODg5LCJleHAiOjE2NjY1NzY0ODksIm5iZiI6MTY2NjU3Mjg4OSwianRpIjoiOXIzczViZ0hyOUJHWk9aeSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.9toV9Vf2W88FoGora9RaaX0k6jqknvu2T3NCym9dv70";


        // $response = Http::get('http://localhost:8000/api/marca');
        $marca = Http::withToken($token)->get('http://localhost:8000/api/marca');
        $this->marca=$marca->json($key = null);
        //$this->marca=$marca->object();
       // dd($this->marca);
        //  dd($this->marca->json($key = null));

    }


    // rules
    public function rules()
    {
        return [
            // 'marca' => 'required|unique:cancelacions,placa',
            'marca' => 'required',
            // 'oficio' => 'required|confirmed|unique:cancelacions,oficio',
        ];
    }
    public function messages()
    {
        return [
            'marca.required' => 'Favor de verificar la placa.',
            // 'marca.unique' => 'Favor de verificar la placa,  ya tiene cancelaciones.',
            // 'oficio.required' => 'Favor de verificar el oficio.',
            // 'oficio.confirmed' => 'Favor de confirmar el oficio.',
            // 'oficio.unique' => 'El oficio ya fue capturado en cancelaciones',
        ];
    }
    // menssages
    public function render()
    {
        return view('livewire.registro.alta-registros', [
            'marca' =>  $this->marca
            ])->extends('layouts.panel')->section('panel_content');
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
