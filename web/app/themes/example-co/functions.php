<?php

declare(strict_types=1);

add_action('wp_enqueue_scripts', static function (): void {
    wp_enqueue_style(
        'example-co',
        get_stylesheet_uri(),
        ['flowhq-main'],
        '0.1.0'
    );
}, 20);
