# FlowHQ Client Template

GitHub template repo for new static WordPress client sites.

## Quick start

1. Click **Use this template** on GitHub
2. Rename for your client (e.g. `client-acme`)
3. Copy `.env.example` → `.env` and fill in Forge/AWS values
4. Copy `terraform/client.tfvars.example` → `terraform/client.tfvars`
5. Customize `content/brief.yml`, run AI to generate `content/seed/*.json` and `config/fields/*.php`
6. Connect repo to Forge, set deploy script to `bash bin/deploy.sh`

## Structure

```
config/static.php       Simply Static overrides
config/fields/*.php     Site-specific MetaBox groups
content/brief.yml       AI input
content/seed/*.json     Committed reproducible content
web/app/themes/         Child theme (branding only)
bin/deploy.sh           Forge deploy hook
terraform/client.tfvars AWS variables per client
```

## WP-CLI (via flowhq/wp-platform)

```bash
wp acme provision   # apply config + load field groups
wp acme seed        # import content/seed/*.json
wp acme export      # Simply Static push to S3
```

## Premium plugins

Meta Box AIO and Simply Static Pro must be added via Private Packagist once configured. Add to `composer.json` repositories section.

## Forge env

See `.env.example` for required variables including `STATIC_URL`, `S3_STATIC_BUCKET`, `S3_MEDIA_BUCKET`, and AWS credentials.
