<div class="container">
  <x-alert error close></x-alert>
  @if (session()->has('danger'))
  <x-alert close alert="danger">{{ session('danger') }}</x-alert>
  @endif
  <br>
  <div class="card-body text-center" wire:loading>
    <div class="spinner-border ml-2" role="status">
      <span class="sr-only">CARGANDO...</span>
    </div>
  </div>

  <form wire:submit.prevent='submit' method="POST">

    <div class="card align-content-center">
      <div class="card-header" style="background-color: #721422">
        <h4 class="text-white">*:</h4>
      </div>
      <div class="card-body">
        @if (trim($alert) != '')
        <x-alert close>{{ $alert }}</x-alert>
        @endif

        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">*</h5>
                <x-alert alert="info">Con esta opción se mostrará el registro de autos.</x-alert>

                <p class="card-text">Con esta opción se mostrará el registro de autos.</p>
                @if (session()->has('danger'))
                <span class="error-message" style="color: red;"> {{ session('danger') }}</span>
                @endif
                <div class="d-flex flex-row flex-wrap">
                  <x-select name="marca" required wire='marca' label="Marca" fill>
                    <x-option default  value=null></x-option>
                    @foreach ($marcas['marca'] ?? [] as $marcasel)
                    <x-option value="{{ $marcasel['id'] }}">{{
                                                    $marcasel['name']}}</x-option>
                    @endforeach
               
                  </x-select>
                  {{-- @if(!is_null($marca)) --}}
                  <x-select id="modelo" required wire label="modelo" fill>
                    <x-option default></x-option>
                    @foreach ($modelos['modelo'] ?? [] as $value => $d)
                    <x-option value="{{ $d['id'] }}">{{
                                                    $d['name']}}</x-option>
                    @endforeach
                  </x-select>
                  {{-- @endif --}}

                </div>
                <button type="sumbit" class="btn btn-lg btn-success" wire:loading.delay.attr="disabled">Enviar</button>
              </div>
              <div>
    {{-- <select wire:model="selected">
        @foreach($this->range() as $number)
            <option value="{{ $number }}">
                {{ $number }}
            </option>
        @endforeach
    </select> --}}
    
    {{-- @if($this->selectionIsValid())
        <strong>
            Congrats! Your number is even and in the correct range!
        </strong>
    @endif --}}
</div>
            </div>
          </div>

        </div>

        <br>


      </div>
    </div>
  </form>
</div>
