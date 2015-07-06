<?php

use cornernote\dashboard\Module;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 */

$this->title = Yii::t('dashboard', 'Create Dashboard');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-create">

    <?php $form = ActiveForm::begin([
        'id' => 'Dashboard',
        'enableClientValidation' => false,
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'layout_class')->dropDownList(array_flip(Module::getInstance()->layouts), ['prompt' => '']) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <?= Html::submitButton('<span class="fa fa-check"></span> ' . Yii::t('dashboard', 'Create'), [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
