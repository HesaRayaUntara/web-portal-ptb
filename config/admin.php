<?php

return [
    'username' => env('ADMIN_USERNAME', 'admin'),
    'password_hash' => env(
        'ADMIN_PASSWORD_HASH',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // hash untuk "password"
    ),
];

