<?php

return [

    'consume' => [

        'alfred' => [
            'url' => 'web',
            'token' => env('API_ALFRED_TOKEN')
        ],

        'sicove' => [
            'url' => '128.222.200.20/sicove',
            'username' => 'pruebas',
            'password' => 'pruebas1',
        ],
        'apiExternos' => [
            'url' => '128.222.200.25:8091/apiExternos/api/',
            'username' => '*',
            'password' => 's3m0v1s1c0v3',
        ],
        'bajasAdmin' => [
            'url' => 'http://128.222.200.178:8810/',
        ],

        'licenciaCurp' => [
            'url' => 'http://128.222.200.25:9015/apiSISCORP/api/',
            'username' => '*',
            'password' => 's3m0v1s1c0v3',
        ],
        'licenciaCandados' => [
            'url' => 'http://128.222.200.25:8084/consultaLicencias.asmx?',
        ],
        'candadosTaxi' => [
            'url' => 'http://128.222.200.32:9006/api/taxi/auxiliar/',
            'opcion' => [
                'candados' => 'candados',
                'insert' => 'insert/candado',
                'update' => 'update/candado'
            ]
        ],
        'candadosLicencias' => [
            'url' => 'http://128.222.200.25:8097/apiCandados/api/',
            'username' => '*',
            'password' => 's3m0v1s1c0v3',
        ],
        
        'api*' => [
            'url' => 'http://128.222.200.25:8090/api*/api/',
            'username' => '*',
            'password' => 's3m0v1s1c0v3',
        ]

    ],

];
