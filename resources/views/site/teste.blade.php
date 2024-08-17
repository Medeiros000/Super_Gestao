{{-- P1 = {{ $xyz }}
<br />
P1 = {{ $zzz }} --}}
@php
    $array_teste = [
        0 => [
            'a' => 'zero_a',
            'b' => 'zero_b',
        ],
        1 => [
            'c' => 'um_c',
            'd' => 'um_d',
        ],
    ];

    echo $array_teste[0]['b'];
@endphp
