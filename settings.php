<?php

// settings.php

define('APP_ROOT', __DIR__);

return [
    'settings' => [
        'slim' => [
            
            'displayErrorDetails' => true,

            'logErrors' => true,

            'logErrorDetails' => true,
        ],

        'doctrine' => [
            
            'dev_mode' => true,

            'cache_dir' => APP_ROOT . '/var/doctrine',

            'metadata_dirs' => [APP_ROOT . '/src/Model'],

        
            'connection' => [
                'driver' => 'pdo_sqlite',
                'path' => APP_ROOT . '/var/database.sqlite'
            ]
        ],
        'twig' => [
            // Twig template path
            'templatePath' => APP_ROOT . '/templates',
            // Twig cache, false or cache path
            'cache' => false,
        ],
        
    ]
];

