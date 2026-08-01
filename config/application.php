<?php

declare(strict_types=1);

use Roots\WPConfig\Config;

$root = dirname(__DIR__);

/**
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env(string $key, mixed $default = null): mixed
{
    $value = $_ENV[$key] ?? getenv($key);

    if ($value === false || $value === '') {
        return $default;
    }

    return match (strtolower((string) $value)) {
        'true', '(true)' => true,
        'false', '(false)' => false,
        'empty', '(empty)' => '',
        'null', '(null)' => null,
        default => $value,
    };
}

Config::define('WP_ENV', env('WP_ENV', 'production'));
Config::define('WP_HOME', env('WP_HOME'));
Config::define('WP_SITEURL', env('WP_SITEURL', env('WP_HOME') . '/wp'));

Config::define('DB_NAME', env('DB_NAME'));
Config::define('DB_USER', env('DB_USER'));
Config::define('DB_PASSWORD', env('DB_PASSWORD'));
Config::define('DB_HOST', env('DB_HOST', 'localhost'));
Config::define('DB_CHARSET', 'utf8mb4');
Config::define('DB_COLLATE', '');
Config::define('DB_PREFIX', env('DB_PREFIX', 'wp_'));

Config::define('AUTH_KEY', env('AUTH_KEY'));
Config::define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
Config::define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
Config::define('NONCE_KEY', env('NONCE_KEY'));
Config::define('AUTH_SALT', env('AUTH_SALT'));
Config::define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
Config::define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
Config::define('NONCE_SALT', env('NONCE_SALT'));

Config::define('CONTENT_DIR', '/app');
Config::define('WP_CONTENT_DIR', $root . '/web/app');
Config::define('WP_CONTENT_URL', Config::get('WP_HOME') . CONTENT_DIR);

Config::define('DISALLOW_FILE_EDIT', true);
Config::define('AUTOMATIC_UPDATER_DISABLED', true);
Config::define('DISABLE_WP_CRON', env('DISABLE_WP_CRON', false));

Config::define('FLOWHQ_CLIENT_ROOT', $root);

Config::apply();

if (! defined('ABSPATH')) {
    define('ABSPATH', $root . '/web/wp/');
}

$table_prefix = env('DB_PREFIX', 'wp_');
