<?php

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\DashboardPanel $model
 */

use cornernote\dashboard\Module;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('dashboard', 'Create Dashboard Panel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = ['label' => $model->dashboard->name, 'url' => ['dashboard/view', 'id' => $model->dashboard_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-panel-create">

    <?php $form = ActiveForm::begin([
        'id' => 'dashboardPanel-form',
        'enableClientValidation' => false,
        'errorSummaryCssClass' => 'alert alert-danger error-summary',
    ]); ?>

    <?= Html::hiddenInput('DashboardPanel[dashboard_id]', $model->dashboard_id); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'panel_class')->dropDownList(array_flip(Module::getInstance()->panels), ['prompt' => '']) ?>

    <?= $form->field($model, 'region')->dropDownList($model->dashboard->layout->getRegionOpts(), ['prompt' => '']) ?>

    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <?= Html::submitButton('<span class="fa fa-check"></span> ' . Yii::t('dashboard', 'Create'), [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
    ]); ?>

    <?php ActiveForm::end(); ?>


</div>
