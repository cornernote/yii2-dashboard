<?php

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\DashboardPanel $model
 */

$this->title = Yii::t('dashboard', 'Update') . ' ' . Yii::t('dashboard', 'Dashboard Panel') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboard Panels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('dashboard', 'Update');
?>
<div class="dashboard-panel-update">

    <?php //= $this->render('_menu', compact('model')); ?>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
