# Pico CMS for Nextcloud

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nextcloud/cms_pico/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nextcloud/cms_pico/?branch=master)
[![codecov](https://codecov.io/gh/nextcloud/cms_pico/branch/master/graph/badge.svg)](https://codecov.io/gh/nextcloud/cms_pico)
[![Build Status](https://drone.nextcloud.com/api/badges/nextcloud/cms_pico/status.svg)](https://drone.nextcloud.com/nextcloud/cms_pico)

### Description

The app **cms_pico** integrate [Pico](https://picocms.org/) in your Nextcloud. This will allow your users to create and manage their own websites with address like: https://cloud.example.com/sites/my_site/. The source of the website will be stored in the users' files and the **Markdown** will be formatted by **Pico** to generate the pages.

Because Pico is using the **Markdown** format, you should consider enabling the [Markdown Editor](https://apps.nextcloud.com/apps/files_markdown) app.

### Manual installation

After cloning the Git repo to Nextcloud's `apps/cms_pico/` folder, change the owner and group of the app's `appdata_public/` directory to the one your webserver is running as (e.g. `www-data`; just check the owner and group of Nextcloud's `data/` folder) and install the app's composer dependencies:

```shell
chown www-data:www-data -R appdata_public
composer install
```

### Configuration

Please check the [Wiki](https://github.com/nextcloud/cms_pico/wiki) for more details.
