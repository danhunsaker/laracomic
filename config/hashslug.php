<?php

return [
    'appsalt' => env('ID_SALT', null),
    'minSlugLength' => env('ID_SIZE', 5),
    'alphabet' => env('ID_CHARS', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),
];
