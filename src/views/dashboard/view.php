<?php

use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 */

$this->title = Yii::t('app', 'Dashboard') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
