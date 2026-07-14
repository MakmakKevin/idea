@props(['name', 'label','type' => 'text','attr' => ''])
<div class="mb-6">
    <label for="{{ $name }}" class="label">{{ $label }}</label>
    <input type="{{ $type }}" class="input" id="{{ $name }}"  value="{{old($name)}}" name="{{ $name }}" {{ $attr }} >

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>