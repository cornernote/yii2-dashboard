<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use cornernote\returnurl\ReturnUrl;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\DashboardPanel $model
 * @var yii\bootstrap\ActiveForm $form
 */

?>

<div class="dashboard-panel-form">

    <?php $form = ActiveForm::begin([
        'id' => 'DashboardPanel',
        'enableClientValidation' => false,
    ]); ?>

    <?= Html::hiddenInput('ru', ReturnUrl::getRequestToken()); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'dashboard_id')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'sort')->textInput() ?>

    <?php //= $form->field($model, 'panel_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <?= $model->panel->renderUpdate($form); ?>

    <?= Html::submitButton('<span class="fa fa-check"></span> ' . ($model->isNewRecord ? Yii::t('dashboard', 'Create') : Yii::t('dashboard', 'Save')), [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
