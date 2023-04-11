<?php

use Milwad\LaravelValidate\Rules\ValidBase64;

return [
    'rules' => [
        'base-64' => [
            'name' => 'base64',
            'class' => ValidBase64::class,
        ]
    ]
];
