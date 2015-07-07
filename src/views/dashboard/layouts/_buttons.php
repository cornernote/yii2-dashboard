<?php

use cornernote\dashboard\Layout;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $layout Layout
 * @var $this View
 */
?>

<?= Html::a('<span class="glyphicon glyphicon-plus small"></span>', [
    'dashboard-panel/create',
    'DashboardPanel' => [
        'dashboard_id' => $layout->dashboard->id,
        'enabled' => 1,
    ],
], [
    'data-toggle' => 'tooltip',
    'title' => Yii::t('dashboard', 'Create Dashboard Panel'),
]) ?>

<?= Html::a('<span class="glyphicon glyphicon-pencil small"></span>', ['update', 'id' => $layout->dashboard->id], [
    'data-toggle' => 'tooltip',
    'title' => Yii::t('dashboard', 'Update Dashboard'),
]) ?>

<?= Html::a('<span class="glyphicon glyphicon-trash small"></span>', ['delete', 'id' => $layout->dashboard->id], [
    'data-confirm' => Yii::t('dashboard', 'Are you sure to delete this dashboard?'),
    'data-method' => 'post',
    'data-toggle' => 'tooltip',
    'title' => Yii::t('dashboard', 'Delete Dashboard'),
]); ?>
