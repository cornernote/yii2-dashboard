<?php

use cornernote\dashboard\Layout;
use cornernote\dashboard\models\DashboardPanel;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $layout Layout
 * @var $this View
 */

$options = (array)json_decode($layout->dashboard->options);

$columns = isset($options['columns']) ? $options['columns'] : 1;
if (!in_array($columns, array(1, 2, 3, 4, 6))) $columns = 1;
$span = round(12 / $columns);

$positions = array();
for ($column = 1; $column <= $columns; $column++) {
    $positions['col_' . $column] = array();
}
foreach ($layout->dashboard->getDashboardPanels()->andWhere(['enabled' => 1])->all() as $dashboardPanel) {
    /* @var $dashboardPanel DashboardPanel */
    $positions[$dashboardPanel->position][] = $dashboardPanel;
}

echo '<div class="row">';
foreach ($positions as $position => $positionPanels) {
    echo '<div class="col-md-' . $span . '">';
    foreach ($positionPanels as $dashboardPanel) {
        /* @var $dashboardPanel DashboardPanel */
        echo '<h3>';
        echo $dashboardPanel->name . ' ';
        echo Html::a('<span class="glyphicon glyphicon-pencil small"></span>', ['dashboard-panel/update', 'id' => $dashboardPanel->id]);
        echo '</h3>';
        echo $dashboardPanel->panel->renderView();
    }
    echo '</div>';
}
echo '</div>';
