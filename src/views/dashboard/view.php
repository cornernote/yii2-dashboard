<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 */

$this->title = Yii::t('dashboard', 'Dashboard') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name ? $model->name : Yii::t('dashboard', 'Dashboard') . ' #' . $model->id;
?>

<div class="dashboard-view">

    <h1>
        <?= $model->name; ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus small"></span>', [
            'dashboard-panel/create',
            'DashboardPanel' => [
                'dashboard_id' => $model->id,
                'enabled' => 1,
            ],
        ], [
            'data-toggle' => 'tooltip',
            'title' => Yii::t('dashboard', 'Create Dashboard Panel'),
        ]) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil small"></span>', ['update', 'id' => $model->id], [
            'data-toggle' => 'tooltip',
            'title' => Yii::t('dashboard', 'Update Dashboard'),
        ]) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash small"></span>', ['delete', 'id' => $model->id], [
            'data-confirm' => Yii::t('dashboard', 'Are you sure to delete this dashboard?'),
            'data-method' => 'post',
            'data-toggle' => 'tooltip',
            'title' => Yii::t('dashboard', 'Delete Dashboard'),
        ]); ?>
    </h1>

    <?= $model->layout->render('view'); ?>

</div>
