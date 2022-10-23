@props([
    'id' => uniqid(),
    'name' => isset($name) ? $name : $id,
    'label' => null,
    'wire' => false,
    'wiredefer' => false,
    'fill' => false,
    'row' => 3,
])


<div class="form-group m-2  @if($fill) flex-fill @endif">
    @isset($label)
        <label class="text-muted">{{ $label }}</label>
    @endisset

    <textarea style="border-radius: 1rem;" rows="{{$row}}"
    class="form-control @error($name) is-invalid @enderror"
    @if ($wire) wire:model="{{ $name }}"
    @elseif($wiredefer) wire:model.defer="{{ $name }}"
    @endif>
        {{ $slot }}
    </textarea>

    @error($name) <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>
