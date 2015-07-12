---
layout: default
title: Module Configuration
permalink: /docs/module-configuration/
---

# Module Configuration

```php
'modules' => [
    'audit' => [
        'class' => 'cornernote\dashboard\Module',
        // the layout that should be applied for views within this module
        'layout' => 'main',
        // Name of the component to use for database access
        'db' => 'db', 
        // Layout classes to be loaded into the module
        'layouts' => [
            'default' => 'cornernote\dashboard\layouts\DefaultLayout',
        ],
        // Panel classes to be loaded into the module
        'panels' => [
            'text' => 'cornernote\dashboard\panels\TextPanel',
        ],
    ],
],
```
