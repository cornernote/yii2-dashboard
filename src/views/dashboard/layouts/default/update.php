<?php

use cornernote\dashboard\models\Dashboard;
use cornernote\dashboard\models\DashboardPanel;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $dashboard Dashboard
 * @var $this View
 */

$options = (array)json_decode($dashboard->options);

$columns = isset($options['columns']) ? $options['columns'] : 1;
if (!in_array($columns, array(1, 2, 3, 4, 6))) $columns = 1;
$span = round(12 / $columns);

$positions = array();
for ($column = 1; $column <= $columns; $column++) {
    $positions['col_' . $column] = array();
}
foreach ($dashboard->getDashboardPanels()->all() as $dashboardPanel) {
    /* @var $dashboardPanel DashboardPanel */
    $positions[$dashboardPanel->position][] = $dashboardPanel;
}

echo '<div class="row">';
foreach ($positions as $position => $positionPanels) {
    echo '<div class="col-md-' . $span . '">';
    foreach ($positionPanels as $dashboardPanel) {
        /* @var $dashboardPanel DashboardPanel */
        //echo $dashboardPanel->name;
        echo $dashboardPanel->panel->renderUpdate();
    }
    echo Html::a(Yii::t('dashboard', 'Create Dashboard Panel'), [
        'dashboard-panel/create',
        'DashboardPanel[dashboard_id]' => $dashboard->id,
        'DashboardPanel[position]' => $position,
    ], ['class' => 'btn btn-primary pull-right']);
    echo '</div>';
}
echo '</div>';
