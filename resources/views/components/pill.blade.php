
@props(['status'])
@php
    $classes = "text-xs rounded-full border px-2 py-1 font-medium";

    if($status === 'pending'){
        $classes .= " bg-yellow-500/10 text-yellow-500/90 border-yellow-500/20";
    }
    if($status === 'completed'){
        $classes .= " bg-green-500/10 text-green-500/90 border-green-500/20";
    }
    if($status === 'in_progress'){
        $classes .= " bg-blue-500/10 text-blue-500/90 border-blue-500/20";
    }

@endphp
<span {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</span>