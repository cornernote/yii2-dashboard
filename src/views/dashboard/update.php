<?php

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 */

use cornernote\dashboard\widgets\AskToSaveWork;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

AskToSaveWork::widget();

$this->title = Yii::t('dashboard', 'Update') . ' ' . Yii::t('dashboard', 'Dashboard') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name ? $model->name : Yii::t('dashboard', 'Dashboard') . ' #' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('dashboard', 'Update');
?>
<div class="dashboard-update">

    <h1>
        <?= $model->name; ?>
    </h1>

    <?php $form = ActiveForm::begin([
        'id' => 'dashboard-form',
        'enableClientValidation' => false,
        'errorSummaryCssClass' => 'alert alert-danger error-summary',
    ]); ?>

    <?= str_replace('<li></li>', '', $form->errorSummary([$model, $model->layout])); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <?= $model->layout->render('form', ['form' => $form]); ?>

    <?= $model->layout->render('update'); ?>

    <div class="form-group">
        <?= Html::submitButton('<span class="fa fa-check"></span> ' . Yii::t('dashboard', 'Save'), [
            'id' => 'save-' . $model->formName(),
            'class' => 'btn btn-success'
        ]); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
