<?php

namespace App\Http\Livewire\Registro;
use App\Models\Tramite;
use App\Services\Consume\LocalApi;
use App\Services\Valid;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Services\Consume\SicoveApi;
use Illuminate\Support\Facades\Http;


class AltaRegistros extends Component
{
    use WithFileUploads;
    public $selectedInput='';
    public $placa;
    public $modelo;
    public $marca;
    public $marcasel=null;
    public $oficio;
    public $oficio_confirmation;
    public $alert;
    // protected $listeners = ['snapPhoto', 'snapPhotoTaken','snapPhotoOperador'];
    public $marcas= [];
    public $modelos= [];
    private  $logueado=null;

    protected $listeners = ['SelectMarca' => 'SelectMarca'];


    public function __construct()
    {
        
    }
    public function mount()
    {
        //dd(auth()->user()->email, decrypt(auth()->user()->password));

        $this->marcas = LocalApi::getMarcas();
    }
    public function range()
    {
        return range(1, 100);
    }
    
    public function selectedIsValid()
    {
        return $this->selected > 0 && $this->selected < 50 && $this->selected % 2 === 0;
    }

    public function updatedMarca(){
        $this->modelos = LocalApi::getModelos($this->marca);
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
            if(!empty($this->marca)) {
               

               // $this->model = Modelo::where('marca_id', $this->marca)->get();
            //    $modelos = Http::withHeaders(['Access-Control-Allow-Credentials'=>'true'])->withToken($this->logueado->json('token'))->get('http://localhost:8000/api/modelo');
            //    $this->modelos=$modelos->json($key = null);
               //dd($this->modelos);
            }
        // echo ($this);
        return view('livewire.registro.alta-registros', [
            // 'marca123' =>  $this->marcas,
            // 'modelo123'=> $this->modelos
            ])->extends('layouts.panel')->section('panel_content');
    }
    public function submit()
    {
      //  echo $this->marca;
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
    public function SelectMarca()
    {
        if(is_null($this->marca))dd($this->marcas);
        
    }

        
}
