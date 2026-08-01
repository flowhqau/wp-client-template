#!/usr/bin/env bash
set -euo pipefail

cd "$(dirname "$0")/.."

echo "==> composer install"
composer install --no-dev --optimize-autoloader --no-interaction

echo "==> wp acme provision"
wp acme provision

if [[ "${AUTO_STATIC_DEPLOY:-false}" == "true" ]]; then
  echo "==> wp acme export"
  wp acme export
fi

echo "==> deploy complete"
