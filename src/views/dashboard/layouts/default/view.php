<?php

use cornernote\dashboard\layouts\DefaultLayout;
use cornernote\dashboard\models\DashboardPanel;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $layout DefaultLayout
 * @var $this View
 */

$columns = isset($layout->dashboard->options['columns']) ? $layout->dashboard->options['columns'] : 1;
if (!in_array($columns, array(1, 2, 3, 4, 6))) $columns = 1;
$span = round(12 / $columns);

$regionPanels = $layout->regionPanels($layout->dashboard->getDashboardPanels()->enabled()->all());

if (isset($regionPanels['overflow'])) {
    $overflow = $regionPanels['overflow'];
    unset($regionPanels['overflow']);
}

echo '<div class="row">';
foreach ($regionPanels as $region => $items) {
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
