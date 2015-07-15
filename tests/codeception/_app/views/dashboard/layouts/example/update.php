<?php
/**
 * @var $layout \tests\app\dashboard\layouts\ExampleLayout
 * @var $this \yii\web\View
 */

$regionPanels = $layout->regionPanels($layout->dashboard->getDashboardPanels()->all(), 'update');

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