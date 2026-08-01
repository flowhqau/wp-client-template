<?php

declare(strict_types=1);

/**
 * Simply Static overrides for this client.
 * Merged with flowhq/wp-platform defaults and Forge env vars.
 */
return [
    'deployment_method' => 'aws-s3',
    'destination_url' => env('STATIC_URL', 'https://www.example.com'),
    'exclude' => [
        '/wp-content/uploads/',
        '/wp-admin/',
        '/wp-json/',
    ],
    'optimize_images' => false,
    'aws' => [
        'bucket' => env('S3_STATIC_BUCKET', ''),
        'region' => env('AWS_REGION', 'ap-southeast-2'),
        'distribution_id' => env('CLOUDFRONT_DISTRIBUTION_ID', ''),
    ],
];
