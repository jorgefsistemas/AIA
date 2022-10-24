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
    // public $marca;
    public $oficio;
    public $oficio_confirmation;
    public $alert;
    protected $listeners = ['snapPhoto', 'snapPhotoTaken','snapPhotoOperador'];
    public $marca= [];


    public function mount()
    {
        //dd(auth()->user()->email, decrypt(auth()->user()->password));
        $logueado = Http::asForm()->post('http://localhost:8000/api/login', [
            'email' => auth()->user()->email,
            'password' => 'todoensubastas',
        ]);
        $marca = Http::withHeaders(['Access-Control-Allow-Credentials'=>'true'])->withToken($logueado->json('token'))->get('http://localhost:8000/api/marca');
        $this->marca=$marca->json($key = null);
    }

    // rules
    public function rules()
    {
        return [
            'marca' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'marca.required' => 'Favor de verificar la placa.',

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
        echo $this->marca;
        //  $this->validate();
        // try {
        //     DB::beginTransaction();
        //     $datosplaca = SicoveApi::consultaPlaca($this->placa);
        //     $this->placa= strtoupper($this->placa);
        //     $datos= $datosplaca->json();
        //     if(!$datos){
        //         session()->flash('danger', 'Ocurrió un error con la conexión al servicio de consulta');
        //         return false;
        //     }
        //     if($datos['code'] != 200){
        //          return session()->flash('danger', 'No existe trámite para la siguiente placa: '.$this->placa);
        //     }
        //     $datos = [ $this->placa, $this->oficio,];
        //     return redirect()->route('placa', ['placa'=> $this->placa, 'oficio'=>$this->oficio]);
        //     DB::commit();
        //     session()->flash('success', 'La información se guardó correctamente');
        //     return redirect()->route('home');
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     session()->flash('danger', 'Ocurrió un error al guardar' . $th->getMessage());
        //     return false;
        // }
    }
}
