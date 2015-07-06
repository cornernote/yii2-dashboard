<?php

use cornernote\dashboard\Layout;
use cornernote\dashboard\models\DashboardPanel;
use kartik\sortable\Sortable;
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

$dashboardPanels = $layout->dashboard->getDashboardPanels()
    ->andWhere(['enabled' => 1])
    ->orderBy(['sort' => SORT_ASC])
    ->all();

foreach ($dashboardPanels as $dashboardPanel) {
    /* @var $dashboardPanel DashboardPanel */
    $positions[$dashboardPanel->position][] = [
        'options' => [
            'id' => 'dashboard-panel-' . $dashboardPanel->id,
            'class' => 'dashboard-panel',
        ],
        'content' => $dashboardPanel->panel->renderView(),
    ];
}

echo '<div class="row">';
foreach ($positions as $position => $items) {
    echo '<div class="col-md-' . $span . '">';
    echo Sortable::widget([
        'id' => 'dashboard-position-' . $position,
        'connected' => true,
        'items' => $items,
        'pluginEvents' => [
            'sortupdate' => 'sort',
        ],
    ]);
    echo '</div>';
}
echo '</div>';
?>
<script>
    function sort(e, ui) {
        var position = ui.endparent.attr("id");
        var dashboardPanelSort = [];
        $('#' + position).find('.dashboard-panel').each(function () {
            dashboardPanelSort.push(this.id);
        });
        $.post('<?= Url::to(['dashboard/sort', 'id' => $layout->dashboard->id]) ?>', {
            Dashboard: {
                position: position,
                dashboardPanelSort: dashboardPanelSort.toString()
            }
        });
    }
</script>
