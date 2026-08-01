<?php
/**
 * Example site-specific MetaBox field group.
 * Loaded by `wp acme provision`.
 */

declare(strict_types=1);

add_filter('rwmb_meta_boxes', static function (array $boxes): array {
    $boxes[] = [
        'id' => 'client_services',
        'title' => __('Services Page', 'client-theme'),
        'post_types' => ['page'],
        'include' => [
            'slug' => 'services',
        ],
        'fields' => [
            [
                'id' => 'services_intro',
                'type' => 'wysiwyg',
                'name' => __('Introduction', 'client-theme'),
            ],
        ],
    ];

    return $boxes;
});
