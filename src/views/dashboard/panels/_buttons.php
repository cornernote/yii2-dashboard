<?php

use cornernote\dashboard\Panel;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $panel Panel
 * @var $this View
 */
?>

<?= Html::a('<span class="glyphicon glyphicon-pencil small"></span>', ['dashboard-panel/update', 'id' => $panel->dashboardPanel->id], [
    'data-toggle' => 'tooltip',
    'title' => Yii::t('dashboard', 'Update Dashboard Panel'),
]) ?>

<?= Html::a('<span class="glyphicon glyphicon-trash small"></span>', ['dashboard-panel/delete', 'id' => $panel->dashboardPanel->id], [
    'data-confirm' => Yii::t('dashboard', 'Are you sure to delete this dashboard panel?'),
    //'data-method' => 'post',
    'data-toggle' => 'tooltip',
    'title' => Yii::t('dashboard', 'Delete Dashboard Panel'),
]) ?>
