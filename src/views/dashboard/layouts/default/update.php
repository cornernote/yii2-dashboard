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

$dashboardPanels = $layout->dashboard->getDashboardPanels()->all();

foreach ($dashboardPanels as $dashboardPanel) {
    /* @var $dashboardPanel DashboardPanel */
    $position = isset($positions[$dashboardPanel->position]) ? $dashboardPanel->position : 'overflow';
    $positions[$position][] = [
        'options' => [
            'id' => 'dashboard-panel-' . $dashboardPanel->id,
            'class' => 'dashboard-panel',
        ],
        'content' => $dashboardPanel->panel->renderUpdate(),
    ];
}
if (isset($positions['overflow'])) {
    $overflow = $positions['overflow'];
    unset($positions['overflow']);
}

echo '<hr>';
echo '<div class="row">';
foreach ($positions as $position => $items) {
    echo '<div class="col-md-' . $span . '">';
    echo Html::hiddenInput('DashboardPanelSort[' . $position . ']', implode(',', ArrayHelper::map($items, 'options.id', 'options.id')), [
        'id' => 'input-dashboard-position-' . $position,
    ]);
    echo Sortable::widget([
        'id' => 'dashboard-position-' . $position,
        'connected' => true,
        'items' => $items,
        'pluginEvents' => [
            'sortupdate' => 'dashboardPanelSort',
        ],
    ]);
    echo '</div>';
}
echo '</div>';
if (isset($overflow)) {
    echo '<hr>';
    echo Html::hiddenInput('DashboardPanelSort[overflow]', implode(',', ArrayHelper::map($overflow, 'options.id', 'options.id')), [
        'id' => 'input-dashboard-position-overflow',
    ]);
    echo Sortable::widget([
        'id' => 'dashboard-position-overflow',
        'connected' => true,
        'items' => $overflow,
        'pluginEvents' => [
            'sortupdate' => 'dashboardPanelSort',
        ],
    ]);
}
?>
<script>
    function dashboardPanelSort(e, ui) {
        var startParent = ui.startparent.attr("id");
        var endParent = ui.endparent.attr("id");

        var startDashboardPanelSort = [];
        $("#" + startParent).find(".dashboard-panel").each(function () {
            startDashboardPanelSort.push(this.id);
        });

        var endDashboardPanelSort = [];
        $("#" + endParent).find(".dashboard-panel").each(function () {
            endDashboardPanelSort.push(this.id);
        });

        $("#input-" + startParent).val(startDashboardPanelSort.toString());
        $("#input-" + endParent).val(endDashboardPanelSort.toString());
    }
</script>
