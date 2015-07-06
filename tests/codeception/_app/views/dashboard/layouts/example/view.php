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