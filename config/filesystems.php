<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'gallery' => [
            'driver' => 'local',
            'root' => storage_path('app/public/gallery'),
            'url' => env('APP_URL').'/storage/gallery',
            'visibility' => 'public',
        ],

        'colors' => [
            'driver' => 'local',
            'root' => storage_path('app/public/colors'),
            'url' => env('APP_URL').'/storage/colors',
            'visibility' => 'public',
        ],
        
        'wheels' => [
            'driver' => 'local',
            'root' => storage_path('app/public/wheels'),
            'url' => env('APP_URL').'/storage/wheels',
            'visibility' => 'public',
        ],

        'slider' => [
            'driver' => 'local',
            'root' => storage_path('app/public/slider'),
            'url' => env('APP_URL').'/storage/slider',
            'visibility' => 'public',
        ],
        
        'videos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/videos'),
            'url' => env('APP_URL').'/storage/videos',
            'visibility' => 'public',
        ],
        'events' => [
            'driver' => 'local',
            'root' => storage_path('app/public/events'),
            'url' => env('APP_URL').'/storage/events',
            'visibility' => 'public',
        ],
        'inspirations' => [
            'driver' => 'local',
            'root' => storage_path('app/public/inspirations'),
            'url' => env('APP_URL').'/storage/inspirations',
            'visibility' => 'public',
        ],
        
        'motorgallery' => [
            'driver' => 'local',
            'root' => storage_path('app/public/motorgallery'),
            'url' => env('APP_URL').'/storage/motorgallery',
            'visibility' => 'public',
        ],
        
        'motorslider' => [
            'driver' => 'local',
            'root' => storage_path('app/public/motorslider'),
            'url' => env('APP_URL').'/storage/motorslider',
            'visibility' => 'public',
        ],
        
        
        'motorvideos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/motorvideos'),
            'url' => env('APP_URL').'/storage/motorvideos',
            'visibility' => 'public',
        ],
        
        
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
