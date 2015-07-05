<?php

use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 */

$this->title = Yii::t('dashboard', 'Dashboard') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="dashboard-view">

    <?= $this->render('_menu', compact('model')); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'layout',
            'sort',
            'options:ntext',
            'enabled',
        ],
    ]); ?>

    <?= $this->render('layouts/' . $model->layout . '/view', array(
        'dashboard' => $model,
    )); ?>

</div>
