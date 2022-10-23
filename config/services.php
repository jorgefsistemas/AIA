<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'sicove' => [
        'url' => env('SICOVE_URL', '128.222.200.20/sicove'),
        'username' => env('SICOVE_USERNAME', 'pruebas'),
        'password' => env('SICOVE_PASSWORD', 'pruebas1'),
    ],
    'alfred' => [
        'url' => env('ALFRED_URL', 'http://128.222.200.94/alfred_2020/api/v1/'),
        'token' => env('ALFRED_TOKEN', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MTJiM2ZiOS0xNTliLTQ3ZDktOTE5Yy0wOTAyYjNhM2NiNzAiLCJqdGkiOiIwYjBjMDI5Zjg4MTI0NjMxM2IyM2VjMThiMmMyM2EwNmI5ODU5OTcxOGViOTIxMDI4OTE4YzQ3NWYyMDgyNTUyNTg1NzU3MmFkYWM1YjMwYiIsImlhdCI6MTY0NjY4NzYwMiwibmJmIjoxNjQ2Njg3NjAyLCJleHAiOjE2NzgyMjM2MDIsInN1YiI6IjUiLCJzY29wZXMiOltdfQ.ZvwmpLCkIGrZ1rWP4pwbU4QEmQlIsIPuk5W2xw1U1eVXknQdRvRuiKjks9Q8xc5Ngz4J4K-HczQskaPeapGtHHDgKLAuz29SIrldbmV13CuFIyUzH1803KqQF9CslqdDmTIZzmyxU0X1a0ik3AyAg8GsGIS1phl5FteWoyb5SpVKdBW8pFKe18-h8RaPs_p1yeMzops0h4l5Dt17IJIpnXYu0d3gGWaXYkggVbczwZxQguRUNWy6ULDWcXJlmrBlv5Pp1FZ2XRM74KQN7iUcqHPZ52bR5x6wPfiq8hwBD_y6GACgVADsUJR5VjthEdt9UqEWx0lttQUS7HQ9Ss0f2FBaz5VKo9uQ-63-iXW06271-CP2vEXTDOHLYhWMJ_up5dScNGmBl9tEvq_RwjRsxK9YISfnbxZ1NYjCxWtK5OqyidPXuIoX8UUEQM2ibc5iRoAgmho9uXH5WksTScw6w88W9hr2iJIQaf8xLSkOhsokwa4DE0rXVcA1N44m9_grxTwA0EBSXLzyTRPUDZ7D1AZtT23srYpf0pEhVyDwU6wWA3BPkPv_1Gw_AH4T7usNpnRWLMVBEA4EAsrl6zTlHzxikaPP3JjhMeBb28Ti9rGnwEePghGA9qOaKVgbDJODJ_2tdSg8jCLjuJP3cxb9CzItDxa9OQR8RPDPtU_k1m4'),
    ],

    'cvtaxi' => [
        'url' => env('CV_TAXI_URL', '128.222.200.140:9000/serviciostaxi/api/')
    ]
];
