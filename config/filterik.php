<?php
return [
    'default_engine' => env('FILTERIK_ENGINE', 'db'), // db | meili
    'meili_index_prefix' => env('FILTERIK_MEILI_PREFIX', ''),
    'allowed_filters' => [],
];
