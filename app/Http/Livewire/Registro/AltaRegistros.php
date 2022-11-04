<?php

namespace App\Http\Livewire\Registro;
use App\Models\Tramite;
use App\Services\Valid;
use Livewire\Component;
use App\Suports\Archivo;
use Illuminate\Http\Request;
use App\Models\Registro\Auto;
use Livewire\WithFileUploads;
use App\Services\Consume\LocalApi;
use Illuminate\Support\Facades\DB;
use App\Services\Consume\SicoveApi;
use Illuminate\Support\Facades\Http;


class AltaRegistros extends Component
{
    use WithFileUploads;

    public $fotografia;
    public $ruta;

    public Auto  $auto;
    // public $selectedInput='';
    // public $placa;
    // public $modelo;
    // public $marca;
    
    // public $year=null;
    // public $color;
    // public $kilometraje;
    // public $precio;
    // public $email;
    // public $tel;
    // public $fotografia;
    // public $oficio;
    // public $falta;

    public $marcasel=null;
    public $alert;
    // protected $listeners = ['snapPhoto', 'snapPhotoTaken','snapPhotoOperador'];
    public $marcas= [];
    public $modelos= [];
    public $autos;
    public $autosdos;
    private  $logueado=null;

    protected $listeners = ['SelectMarca' => 'SelectMarca'];


    public function __construct()
    {
        
    }
    public function mount(Request $request)
    {
        $this->auto = new Auto();
        // dd( $request->all());
        //dd(auth()->user()->email, decrypt(auth()->user()->password));

        $this->marcas = LocalApi::getMarcas();
        //dd($this->autosdos);

        //dd($this->autos['auto']);
    }
    public function range()
    {
        return range(1, 100);
    }
    
    public function selectedIsValid()
    {
        return $this->selected > 0 && $this->selected < 50 && $this->selected % 2 === 0;
    }

    public function updatedAutoMarca(){
        $this->modelos = LocalApi::getModelos($this->auto['marca']);
    }
    // rules
    public function rules()
    {
        return [
            'auto.marca' => 'required',
            'auto.modelo' => 'required',
            'auto.anio' => 'required',
            'auto.precio' => 'required',
            'auto.kilometraje' => 'required',
            'auto.color' => 'required',
            'auto.email' => 'required',
            'auto.telefono' => 'required',
            // 'auto.fotografia' => 'required|file'

        ];
    }
    public function messages()
    {
        return [
            'auto.marca.required' => 'Favor de verificar la marca.',
            'auto.modelo.required' => 'Favor de verificar la modelo.',
            'auto.anio.required' => 'Favor de verificar el año.',
            'auto.kilometraje.required' => 'Favor de verificar el kilometraje.',
            'auto.color.required' => 'Favor de verificar el kilometraje.',
            'auto.email.required' => 'Favor de verificar el kilometraje.',
            'auto.fotografia.required' => 'Favor de verificar el fotografia.',
            'auto.telefono.required' => 'Favor de verificar el telefono.'


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
            $this->autos = LocalApi::getAutos();

        // echo ($this);
        return view('livewire.registro.alta-registros', [
            // 'marca123' =>  $this->marcas,
            // 'modelo123'=> $this->modelos
            //  'autos'=> $this->autos['auto']
            ])->extends('layouts.panel')->section('panel_content');
    }
    public function submit()
    {
        //dd($this);
       
        //  $this->validate();
         try {
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
        $this->validaAutos();

        } catch (\Throwable $th) {
        //     DB::rollBack();
        //     session()->flash('danger', 'Ocurrió un error al guardar' . $th->getMessage());
        //     return false;
         }
    }
    public function SelectMarca()
    {
        if(is_null($this->marca))dd($this->marcas);
        
    }
    public function validaAutos()
    { 
            // $archivo = Archivo::guardarAmbos($documento, $key, $this->auto['marca']."-".$this->auto['modelo']."-".$this->auto['anio']."-".$this->auto['kilometraje']);
            // $archivo = Archivo::guardarAmbos($this->fotografia, 1, $this->auto['marca']."-".$this->auto['modelo']."-".$this->auto['anio']."-".$this->auto['kilometraje']);
            
            // dd($archivo->path);
            // $auto = Archivo::guardarAmbos($this->fotografia, 1, $this->auto['marca']."-".$this->auto['modelo']."-".$this->auto['anio']."-".$this->auto['kilometraje']);

            $autostore = LocalApi::storeAutos($this->auto,$this->fotografia);

            // dd("NO validate", $autostore);


    }

        
}
