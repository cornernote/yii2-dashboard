# Module Configuration

```php
'modules' => [
    'audit' => [
        'class' => 'bedezign\yii2\audit\Audit',
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
