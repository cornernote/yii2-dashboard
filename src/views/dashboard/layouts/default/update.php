<?php

use cornernote\dashboard\layouts\DefaultLayout;
use kartik\sortable\Sortable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $layout DefaultLayout
 * @var $this View
 */

$columns = isset($layout->dashboard->options['columns']) ? $layout->dashboard->options['columns'] : 1;
if (!in_array($columns, array(1, 2, 3, 4, 6))) $columns = 1;
$span = round(12 / $columns);

$regionPanels = $layout->regionPanels($layout->dashboard->getDashboardPanels()->all(), 'update');

if (isset($regionPanels['none'])) {
    $overflow = $regionPanels['none'];
    unset($regionPanels['none']);
}

echo '<hr>';
echo '<div class="row">';
foreach ($regionPanels as $region => $items) {
    echo '<div class="col-md-' . $span . '">';
    echo Html::hiddenInput('DashboardPanelSort[' . $region . ']', implode(',', ArrayHelper::map($items, 'options.id', 'options.id')), [
        'id' => 'input-dashboard-region-' . $region,
    ]);
    echo Sortable::widget([
        'id' => 'dashboard-region-' . $region,
        'connected' => true,
        'items' => $items,
        'pluginEvents' => [
            'sortupdate' => 'dashboardPanelSort',
        ],
    ]);
    echo '<div class="text-center">';
    echo Html::a(Yii::t('dashboard', 'Create Dashboard Panel'), [
        'dashboard-panel/create',
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
if (isset($overflow)) {
    echo '<hr>';
    echo Html::hiddenInput('DashboardPanelSort[overflow]', implode(',', ArrayHelper::map($overflow, 'options.id', 'options.id')), [
        'id' => 'input-dashboard-region-overflow',
    ]);
    echo Sortable::widget([
        'id' => 'dashboard-region-overflow',
        'connected' => true,
        'items' => $overflow,
        'pluginEvents' => [
            'sortupdate' => 'dashboardPanelSort',
        ],
    ]);
}