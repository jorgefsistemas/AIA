<?php

namespace App\Http\Livewire\Cancelacion;

use Livewire\Component;

class PlacaCancelaciones extends Component
{
    public function render()
    {


        return view('livewire.cancelacion.placa-cancelaciones', ['cancelaciones'=> $this->cancelaciones]);
    }
    public function mount(){

    }
}
