<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Supported Currencies
    |--------------------------------------------------------------------------
    |
    | This file contains the list of supported currencies across the application.
    | Each currency is defined with its code, name, and symbol.
    |
    */

    'currencies' => [
        'USD' => [
            'name' => 'US Dollar',
            'symbol' => '$',
            'code' => 'USD',
            'symbol_position' => 'before', // before or after
        ],
        'EUR' => [
            'name' => 'Euro',
            'symbol' => '€',
            'code' => 'EUR',
            'symbol_position' => 'before',
        ],
        'GBP' => [
            'name' => 'British Pound',
            'symbol' => '£',
            'code' => 'GBP',
            'symbol_position' => 'before',
        ],
        'INR' => [
            'name' => 'Indian Rupee',
            'symbol' => '₹',
            'code' => 'INR',
            'symbol_position' => 'before',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Currency
    |--------------------------------------------------------------------------
    |
    | The default currency used throughout the application.
    |
    */
    'default' => 'USD',
];
