<?php

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 */

$this->title = Yii::t('dashboard', 'Update') . ' ' . Yii::t('dashboard', 'Dashboard') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('dashboard', 'Update');
?>
<div class="dashboard-update">

    <?= $this->render('_menu', compact('model')); ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

    <?= $this->render('layouts/' . $model->layout . '/update', array(
        'dashboard' => $model,
    )); ?>

</div>
