---
layout: default
title: Installation and Configuration
permalink: /docs/installation/
---

# Installation and Configuration

## Download

Download using composer by running the following command:

```
$ composer require --prefer-dist cornernote/yii2-dashboard "*"
```

Or add a `require` line to your `composer.json`: 

```
{
    "require": {
        "cornernote/yii2-dashboard": "*"
    }
}
```

## Migrations

Run the migrations from the `migrations` folder to create the relevant tables:  

```
$ php yii migrate --migrationPath=@cornernote/dashboard/migrations
```

## Module Configuration

Add `Dashboard` to your configuration array:

```php
$config = [
    'modules' => [
        'dashboard' => 'cornernote\dashboard\Module',
    ],
];
```

See [Module Configuration](../module-configuration/) for the all configuration options and advanced usage information.


## Where to now ?

Check out the other [Documentation](../)
