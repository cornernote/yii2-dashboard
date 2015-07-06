<?php

use cornernote\dashboard\Layout;
use cornernote\dashboard\models\DashboardPanel;
use kartik\sortable\Sortable;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
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

$dashboardPanels = $layout->dashboard->getDashboardPanels()->andWhere(['enabled' => 1])->all();

foreach ($dashboardPanels as $dashboardPanel) {
    /* @var $dashboardPanel DashboardPanel */
    $position = isset($positions[$dashboardPanel->position]) ? $dashboardPanel->position : 'overflow';
    $positions[$position][] = [
        'options' => [
            'id' => 'dashboard-panel-' . $dashboardPanel->id,
            'class' => 'dashboard-panel',
        ],
        'content' => $dashboardPanel->panel->renderView(),
    ];
}
if (isset($positions['overflow'])) {
    $overflow = $positions['overflow'];
    unset($positions['overflow']);
}

echo '<div class="row">';
foreach ($positions as $position => $items) {
    echo '<div class="col-md-' . $span . '">';
    foreach ($items as $item) {
        echo Html::tag('div', $item['content'], $item['options']);
    }
    echo '</div>';
}
echo '</div>';

if (isset($overflow)) {
    echo '<hr>';
    foreach ($overflow as $item) {
        echo Html::tag('div', $item['content'], $item['options']);
    }
}
