<?php

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\DashboardPanel $model
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('dashboard', 'Update') . ' ' . Yii::t('dashboard', 'Dashboard Panel') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = ['label' => $model->dashboard->name, 'url' => ['dashboard/view', 'id' => $model->dashboard_id]];
$this->params['breadcrumbs'][] = $model->name ? $model->name : Yii::t('dashboard', 'Dashboard Panel') . ' #' . $model->id;
?>
<div class="dashboard-panel-update">

    <?php $form = ActiveForm::begin([
        'id' => 'dashboardPanel-form',
        'enableClientValidation' => false,
        'errorSummaryCssClass' => 'alert alert-danger error-summary',
    ]); ?>

    <?= str_replace('<li></li>', '', $form->errorSummary([$model, $model->panel])); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <?= $model->panel->render('form', ['form' => $form]); ?>

    <?= Html::submitButton('<span class="fa fa-check"></span> ' . Yii::t('dashboard', 'Save'), [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
