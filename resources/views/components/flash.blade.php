<div>

    <x-alert close error></x-alert>

    @if (session()->has('success'))
    <x-alert close alert="success">{{ session('success') }}</x-alert>
    @endif

    @if (session()->has('info'))
    <x-alert close alert="info">{{ session('info') }}</x-alert>
    @endif

    @if (session()->has('danger'))
    <x-alert close alert="danger">{{ session('danger') }}</x-alert>
    @endif

    @if (session()->has('warning'))
    <x-alert close alert="warning">{{ session('warning') }}</x-alert>
    @endif
</div>
