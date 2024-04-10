## Requirements
[![PHP Version Require](https://poser.pugx.org/inserve/ingram-marketplace-api-php/require/php)](https://packagist.org/packages/inserve/ingram-marketplace-api-php)

## Status

![workflow](https://github.com/inserveit/ingram-marketplace-api-php/actions/workflows/build-actions.yml/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/inserve/ingram-marketplace-api-php/v)](https://packagist.org/packages/inserve/ingram-marketplace-api-php)
[![Latest Unstable Version](https://poser.pugx.org/inserve/ingram-marketplace-api-php/v/unstable)](https://packagist.org/packages/inserve/ingram-marketplace-api-php)
[![License](https://poser.pugx.org/inserve/ingram-marketplace-api-php/license)](https://packagist.org/packages/inserve/ingram-marketplace-api-php)

## About
A PHP Wrapper for [Ingram Micro Marketplace API](https://apidocs.cloud.im/1.15/spec/)

## Installation
`composer require inserve/ingram-marketplace-api-php`

## Usage example


```php
<?php

use Inserve\IngramMarketplaceAPI\IngramMarketplaceAPIClient;

require 'vendor/autoload.php';

$api = new IngramMarketplaceAPIClient();
$result = $api->authenticate('username', 'password', 'subscription.key', 'nl');

if (! $result) {
    return;
}

$products = $api->product->list();

```
