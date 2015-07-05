<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use cornernote\returnurl\ReturnUrl;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 * @var yii\bootstrap\ActiveForm $form
 */

?>

<div class="dashboard-form">

    <?php $form = ActiveForm::begin([
        'id' => 'Dashboard',
        'enableClientValidation' => false,
    ]); ?>

    <?= Html::hiddenInput('ru', ReturnUrl::getRequestToken()); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'layout_class')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <?= $model->layout->renderUpdate($form); ?>

    <?= Html::submitButton('<span class="fa fa-check"></span> ' . ($model->isNewRecord ? Yii::t('dashboard', 'Create') : Yii::t('dashboard', 'Save')), [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
