<?php

declare(strict_types=1);

/**
 * Load FlowHQ MetaBox field library when installed via Composer.
 */
$autoload = dirname(__DIR__, 2) . '/vendor/autoload.php';

if (! is_readable($autoload)) {
    return;
}

require_once $autoload;

$fieldsBootstrap = dirname(__DIR__, 2) . '/vendor/flowhq/mb-field-library/flowhq-fields.php';

if (is_readable($fieldsBootstrap)) {
    require_once $fieldsBootstrap;
}
