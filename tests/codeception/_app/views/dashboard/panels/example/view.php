<?php
/**
 * @var $panel \app\dashboard\panels\ExamplePanel
 * @var $this \yii\web\View
 */
?>

<h3>
    <?= $panel->dashboardPanel->name ?>
    <?= \yii\helpers\Html::a(
        '<span class="glyphicon glyphicon-pencil small"></span>',
        ['dashboard-panel/update', 'id' => $panel->dashboardPanel->id],
        [
            'data-toggle' => 'tooltip',
            'title' => 'Update Dashboard Panel',
        ]
    ) ?>
    <?= \yii\helpers\Html::a(
        '<span class="glyphicon glyphicon-trash small"></span>',
        ['dashboard-panel/delete', 'id' => $panel->dashboardPanel->id],
        [
            'data-confirm' => 'Are you sure to delete this dashboard panel?',
            'data-toggle' => 'tooltip',
            'title' => 'Delete Dashboard Panel',
        ]
    ) ?>
</h3>
<div class="well">
    <?php \yii\helpers\VarDumper::dump($panel->dashboardPanel->options); ?>
</div>