<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 */

$this->title = Yii::t('dashboard', 'Dashboard') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="dashboard-view">

    <h1>
        <?= $model->name; ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil small"></span>', ['update', 'id' => $model->id]) ?>
    </h1>

    <?= $model->layout->renderView(); ?>

</div>
