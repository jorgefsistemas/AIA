<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/') }}"><i class="fa fa-home text-secondary"></i></a></li>
            @if (isset($items) and is_array($items))
                @foreach ($items ?? [] as $item)
                    @if ($item == end($items))
                    <li class="breadcrumb-item active" aria-current="page">{{ $item }}</li>
                    @else
                    <li class="breadcrumb-item">{{ $item }}</li>
                    @endif
                @endforeach
            @endisset
        </ol>
    </nav>
</div>
