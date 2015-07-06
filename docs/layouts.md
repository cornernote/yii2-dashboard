# Layouts

A layout defines a set of Regions in which Panels can be placed.


### `app/dashboard/layouts/ExampleLayout.php`

```php
<?php
namespace app\dashboard\layouts;

class ExampleLayout extends \cornernote\dashboard\Layout
{

    public $viewPath = '@cornernote/dashboard/views/dashboard/layouts/example';

    public $customSetting;

    public function getRegionOpts()
    {
        return [
            'column-1' => 'Column 1',
            'column-2' => 'Column 2',
        ];
    }

    public function getRegionPanels()
    {
        $regions = [];
        for ($column = 1; $column <= $this->columns; $column++) {
            $regions['column-' . $column] = [];
        }
        $dashboardPanels = $this->dashboard->getDashboardPanels()->enabled()->all();
        foreach ($dashboardPanels as $dashboardPanel) {
            $regions[$dashboardPanel->region][] = [
                'options' => [
                    'id' => 'dashboard-panel-' . $dashboardPanel->id,
                    'class' => 'dashboard-panel',
                ],
                'content' => $dashboardPanel->panel->renderView(),
            ];
        }
        return $regions;
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


### `app/dashboard/views/layouts/example/view.php`

```php
<?php
/**
 * @var $layout \app\dashboard\layouts\ExampleLayout
 * @var $this \yii\web\View
 */

$regions = $layout->getRegionPanels();

echo '<div class="row">';
foreach ($regions as $region => $items) {
    echo '<div class="col-md-6">';
    foreach ($items as $item) {
        echo Html::tag('div', $item['content'], $item['options']);
    }
    echo '</div>';
}
echo '</div>';

```


### `app/dashboard/views/layouts/example/update.php`

```php
<?php
/**
 * @var $layout \app\dashboard\layouts\ExampleLayout
 * @var $this \yii\web\View
 */

$regions = $layout->getRegionPanels();

echo '<div class="row">';
foreach ($regions as $region => $items) {
    echo '<div class="col-md-6">';
    echo \yii\helpers\Html::hiddenInput('DashboardPanelSort[' . $region . ']', implode(',', \yii\helpers\ArrayHelper::map($items, 'options.id', 'options.id')), [
        'id' => 'input-dashboard-region-' . $region,
    ]);
    echo \kartik\sortable\Sortable::widget([
        'id' => 'dashboard-region-' . $region,
        'connected' => true,
        'items' => $items,
        'pluginEvents' => [
            'sortupdate' => 'dashboardPanelSort',
        ],
    ]);
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


### `app/dashboard/views/layouts/example/form.php`

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