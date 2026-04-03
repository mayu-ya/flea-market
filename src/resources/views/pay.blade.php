@php
    $paytext = [1 => 'コンビニ払い', 2 => 'カード支払い'][ $input_data ];
@endphp

<div>{{ $paytext }}</div>