<?php
namespace App\Http\Livewire\Cancelacion;

use Livewire\Component;
use App\Services\Consume\SicoveApi;
use Illuminate\Support\Facades\Auth;
use App\Models\Cancelacion\Cancelacion;
use App\Repositories\Cancelacion\CancelacionRepository;
use App\Repositories\Cancelacion\ICancelaciondosRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\EloquentRepositoryInterface;

class Placa extends Component
{
    public $placa;
    public $oficio;
    public $readonly = false;
    public Cancelacion $cancelacion;
    public $data=[];

    public function mount()
    {
        $this->cancelacion = new Cancelacion;
        $this->oficio = strtoupper($_GET['oficio']);
        $this->placaoficio = strtoupper($_GET['placa']);
        $datos = SicoveApi::consultaPlacaDetalle(strtoupper($_GET['placa']));
        $this->placa = $datos->json();
    }

    public function getUserrepositoryProperty() : UserRepository
    {
        return resolve(UserRepository::class);
    }
    public function getUserRepositoryInterfaceProperty() : UserRepositoryInterface
    {
        return resolve(UserRepositoryInterface::class);
    }



    // rules
    public function rules()
    {
        return [
            'placa' => 'nullable',
            'oficio' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'placa.*' => 'Favor de verificar la placa.',
            'oficio.*' => 'Favor de verificar el oficio.',
        ];
    }

    // menssages

    public function render()
    {
        return view('livewire.cancelacion.placa', ['cancelaciones' => $this->placa, 'oficio' => $this->oficio])->extends('layouts.panel')->section('panel_content');
    }
    public function submit()
    {
        $this->validate();
    }

    public function incorrecto()
    {
        alert('Favor de verificar expediente');
        return redirect()->route('cancelacion_movimientos');
    }
    // public function cancelar_movimiento($key, ICancelaciondosRepository $cancelaciondosRepo, CancelacionRepository $cancelacionRepository, UserRepositoryInterface $userRepositorieI, UserRepository $userrepository)
    public function cancelar_movimiento($key, ICancelaciondosRepository $cancelaciondosRepo, CancelacionRepository $cancelacionRepository)
    {
        //Example for implement model reposotorie
        // dd($userrepository->find(2));
        // dd($userRepositorieI->all());
        // dd($this->Userrepository->find(3));
        //dd($this->UserRepositoryInterface->all());

        $tramite = $this->placa['data'][$key];
        $datosbusqueda = $tramite;
        //try catch inicio
        try {

            if (isset($tramite)) {
                $datos = SicoveApi::cancelaPlaca($this->placaoficio, $this->oficio);
                if ($datos->successful() != true) {
                    session()->flash('danger', 'Ocurrió el siguiente error: ' . $datos->json()['error']);
                    return redirect()->route('placa', ['placa' => $this->placaoficio, 'oficio' => $this->oficio]);
                }else{
                    //llamar la función para cancelar
                    session()->flash('success', 'Movimiento Cancelado: ');
                    //grabar en modelo de Cancelaciones de
                    $this->data['oficio']=$this->oficio;
                    $this->data['placa']=$this->placaoficio;
                    $this->data['user_id']=Auth::user()->id;
                    //Usar el repositorio cancelacion 1
                    $cancelacionRepository->crear($this->data);
                    //dd($cancelaciondosRepo->create($this->data));
                    //Agregar al Avtivityloger
                    activity()->performedOn( $this->cancelacion)->withProperties(['linea_captura' => $datosbusqueda['linea_captura'], 'status' => $datos->status()])->log($this->placaoficio.','.$this->oficio);
                    return redirect()->route('home');
                }
            } else {
            };
            return redirect()->route('home');
        } catch (\Throwable $th) {
            session()->flash('danger', 'Ocurrió un error al imprimir' . $th->getMessage());
            activity()->performedOn( $this->cancelacion)->withProperties(['linea_captura' => $datosbusqueda['linea_captura'], 'status' => $datos->status()])->log($this->placaoficio.','.$this->oficio);
            return redirect()->route('home');
        }
    }
}
