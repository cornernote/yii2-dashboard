---
layout: default
title: Panels
permalink: /docs/panels/
---

# Panels

A panel defines a block that will be rendered inside a layout region.  In addition it allows the user to enter custom options into the panel form when updating the panel.


## Panel Class

The panel class allows you to define the block code that will be rendered inside a layout region.

It extends `yii\base\Model`, allowing you to define custom settings which will be available for the user to
configure the panel via a form when updating the panel.

Place the following code into `app/dashboard/panels/ExamplePanel.php`:

```php
<?php
namespace app\dashboard\panels;

class ExamplePanel extends \cornernote\dashboard\Panel
{

    public $viewPath = '@app/views/dashboard/panels/example';

    public $customSetting;

    public function rules()
    {
        return [
            [['customSetting'], 'required'],
        ];
    }

}
```


## Panel View

The layout view will render the panel in "view" mode.

Place the following code into `app/views/dashboard/panels/example/view.php`:

```php
<?php
/**
 * @var $panel \app\dashboard\panels\ExamplePanel
 * @var $this \yii\web\View
 */

echo '<h2>';
echo $panel->dashboardPanel->name;
echo $this->render('@cornernote/dashboard/views/dashboard/panels/_buttons', ['panel' => $panel]);
echo '</h2>';
?>

<div class="well">
    <?php \yii\helpers\VarDumper::dump($panel->dashboardPanel->options); ?>
</div>
```


## Panel Update

The panel update will render the panel in "update" mode.  This provides a simplified panel when the user is moving the panel between regions.

Place the following code into `app/views/dashboard/panels/example/update.php`:

```php
<?php
/**
 * @var $panel \app\dashboard\panels\ExamplePanel
 * @var $this \yii\web\View
 */

echo '<h2>';
echo $panel->dashboardPanel->name;
echo $this->render('@cornernote/dashboard/views/dashboard/panels/_buttons', ['panel' => $panel]);
echo '</h2>';
?>

<div class="well">
    <?php \yii\helpers\VarDumper::dump($panel->dashboardPanel->options); ?>
</div>
```


## Panel Form

The panel form will render form elements for the custom options available to your panel.

Place the following code into `app/views/dashboard/panels/example/form.php`:

```php
<?php
/**
 * @var $panel \app\dashboard\panels\ExamplePanel
 * @var $this \yii\web\View
 * @var $form \yii\bootstrap\ActiveForm
 */
?>

<?= $form->field($panel, 'customSetting')->textInput() ?>
```


## Configuration

Finally you will need to add your panel to the module configuration:

```php
<?php
$config = [
    'modules' => [
        'dashboard' => [
            'panels' => [
                'example' => 'app\dashboard\panels\ExamplePanel',
            ],
        ],
    ],
];
```
