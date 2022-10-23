@props(['alert' => 'danger', 'error' => false, 'close' => false])

@if ($error)
    @if ($errors->any())
        <div class="alert alert-{{ $alert }} fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span>{{ $slot }}</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif
@else
    @if ($close)
        <div class="alert alert-{{ $alert }} fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $slot }}
        </div>
    @else
        <div class="alert alert-{{ $alert }}" role="alert">
            {{ $slot }}
        </div>
    @endif
@endif
