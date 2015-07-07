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

    <?= $model->layout->render('view'); ?>

</div>
