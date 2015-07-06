<?php

use cornernote\dashboard\panels\TextPanel;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\View;

/**
 * @var $panel TextPanel
 * @var $this View
 */
?>

<h2>
    <?= $panel->dashboardPanel->name ?>
    <?= Html::a('<span class="glyphicon glyphicon-pencil small"></span>', ['dashboard-panel/update', 'id' => $panel->dashboardPanel->id], [
        'data-toggle' => 'tooltip',
        'title' => Yii::t('dashboard', 'Update Dashboard Panel'),
    ]) ?>
    <?= Html::a('<span class="glyphicon glyphicon-trash small"></span>', ['dashboard-panel/delete', 'id' => $panel->dashboardPanel->id], [
        'data-confirm' => Yii::t('dashboard', 'Are you sure to delete this dashboard panel?'),
        'data-method' => 'post',
        'data-toggle' => 'tooltip',
        'title' => Yii::t('dashboard', 'Delete Dashboard Panel'),
    ]) ?>
</h2>
<div class="well">
    <?php VarDumper::dump($panel->dashboardPanel->options); ?>
</div>