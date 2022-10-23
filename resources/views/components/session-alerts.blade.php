<div>
    @if (session()->has('success'))
    <x-alert close="true" alert="success">{{ session('success') }}</x-alert>
    @endif

    @if (session()->has('info'))
    <x-alert close="true" alert="info">{{ session('info') }}</x-alert>
    @endif

    @if (session()->has('danger'))
    <x-alert close="true" alert="danger">{{ session('danger') }}</x-alert>
    @endif

    @if (session()->has('warning'))
    <x-alert close="true" alert="warning">{{ session('warning') }}</x-alert>
    @endif
</div>
