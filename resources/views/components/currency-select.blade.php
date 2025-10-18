@props([
    'name' => 'currency',
    'id' => null,
    'value' => null,
    'required' => false,
    'class' => '',
    'style' => '',
    'placeholder' => 'Select Currency'
])

@php
    $id = $id ?: $name;
    $currencies = \App\Services\CurrencyService::getCurrencies();
    $selectedValue = old($name, $value);
@endphp

<select 
    name="{{ $name }}" 
    id="{{ $id }}" 
    {{ $required ? 'required' : '' }}
    class="{{ $class }}"
    style="{{ $style }}"
    {{ $attributes }}
>
    @if($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif
    
    @foreach($currencies as $code => $currency)
        <option value="{{ $code }}" {{ $selectedValue == $code ? 'selected' : '' }}>
            {{ $code }} - {{ $currency['name'] }}
        </option>
    @endforeach
</select>
