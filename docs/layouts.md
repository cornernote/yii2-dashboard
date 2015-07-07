# Layouts

A layout defines a set of Regions in which Panels can be placed.  In addition it allows the user to enter custom options into the dashboard form when updating the dashboard.


## Layout Class

The layout class allows you to define regions where panels can be rendered.

It extends `yii\base\Model`, allowing you to define custom settings which will be available for the user to
configure the layout via a form when updating the dashboard.

Place the following code into `app/dashboard/layouts/ExampleLayout.php`:

```php
<?php
namespace app\dashboard\layouts;

class ExampleLayout extends \cornernote\dashboard\Layout
{

    public $viewPath = '@app/views/dashboard/layouts/example';

    public $customSetting;

    public function rules()
    {
        return [
            [['customSetting'], 'required'],
        ];
    }

    public function getOptions()
    {
        return [
            'customSetting' => $this->customSetting,
        ];
    }

    public function getRegionOpts()
    {
        return [
            'column-1' => 'Column 1',
            'column-2' => 'Column 2',
        ];
    }

    public function regionPanels($dashboardPanels)
    {
        $regionPanels = [
            'column-1' => [],
            'column-2' => [],
        ];
        $dashboardPanels = $this->dashboard->getDashboardPanels()->enabled()->all();
        foreach ($dashboardPanels as $dashboardPanel) {
            $regionPanels[$dashboardPanel->region][] = [
                'options' => [
                    'id' => 'dashboard-panel-' . $dashboardPanel->id,
                    'class' => 'dashboard-panel',
                ],
                'content' => $dashboardPanel->panel->renderView(),
            ];
        }
        return $regionPanels;
    }

    public function renderView()
    {
        return \Yii::$app->view->render($this->viewPath . '/view', [
            'layout' => $this,
        ]);
    }

    public function renderUpdate()
    {
        return \Yii::$app->view->render($this->viewPath . '/update', [
            'layout' => $this,
        ]);
    }

    public function renderForm($form)
    {
        return \Yii::$app->view->render($this->viewPath . '/form', [
            'layout' => $this,
            'form' => $form,
        ]);
    }

}
```


## Layout View

The layout view will render the dashboard and all of it's panels in "view" mode.

Place the following code into `app/views/dashboard/layouts/example/view.php``:

```php
<?php
/**
 * @var $layout \app\dashboard\layouts\ExampleLayout
 * @var $this \yii\web\View
 */

$regionPanels = $layout->regionPanels($layout->dashboard->getDashboardPanels()->enabled()->all());

echo '<div class="row">';
foreach ($regionPanels as $region => $items) {
    echo '<div class="col-md-6">';
    foreach ($items as $item) {
        echo \yii\helpers\Html::tag('div', $item['content'], $item['options']);
    }
    echo '</div>';
}
echo '</div>';

```


## Layout Update

The layout update will render the dashboard and all of it's panels in "update" mode.  This allows the user to drag-and-drop panels between the regions.

Place the following code into `app/views/dashboard/layouts/example/update.php`:

```php
<?php
/**
 * @var $layout \app\dashboard\layouts\ExampleLayout
 * @var $this \yii\web\View
 */

$regionPanels = $layout->regionPanels($layout->dashboard->getDashboardPanels()->all());

echo '<div class="row">';
foreach ($regionPanels as $region => $items) {
    echo '<div class="col-md-6">';

    // hidden element to store the sort order
    echo \yii\helpers\Html::hiddenInput(
        'DashboardPanelSort[' . $region . ']',
        implode(',', \yii\helpers\ArrayHelper::map($items, 'options.id', 'options.id')),
        [
            'id' => 'input-dashboard-region-' . $region,
        ]
    );

    // sortable widget to enable drag-and-drop
    echo \kartik\sortable\Sortable::widget([
        'id' => 'dashboard-region-' . $region,
        'connected' => true,
        'items' => $items,
        'pluginEvents' => [
            'sortupdate' => 'dashboardPanelSort',
        ],
    ]);

    // create dashboard panel button
    echo '<div class="text-center">';
    echo \yii\helpers\Html::a('Create Dashboard Panel', [
        'dashboard/dashboard-panel/create',
        'DashboardPanel' => [
            'dashboard_id' => $layout->dashboard->id,
            'region' => $region,
            'sort' => count($items),
            'enabled' => 1,
        ]
    ], ['class' => 'btn btn-default btn-sm']);
    echo '</div>';

    echo '</div>';
}
echo '</div>';
```


## Layout Form

The layout form will render form elements for the custom options available to your layout.

Place the following code into `app/views/dashboard/layouts/example/form.php`:

```php
<?php
/**
 * @var $layout \app\dashboard\layouts\ExampleLayout
 * @var $this \yii\web\View
 * @var $form \yii\bootstrap\ActiveForm
 */
?>

<?= $form->field($layout, 'customSetting')->textInput() ?>
```


## Configuration

Finally you will need to add your layout to the module configuration:

```php
$config = [
    'modules' => [
        'dashboard' => [
            'layouts' => [
                'example' => 'app\dashboard\layouts\ExampleLayout',
            ],
        ],
    ],
];
```
