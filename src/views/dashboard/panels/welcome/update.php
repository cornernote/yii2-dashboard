<?php

use cornernote\dashboard\panels\WelcomePanel;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $panel WelcomePanel
 * @var $this View
 */
?>

<div class="dashboard-panel-form">

    <?php $form = ActiveForm::begin([
        'id' => 'DashboardPanel',
        //'layout' => 'horizontal',
        'enableClientValidation' => false,
    ]); ?>

    <?= $form->errorSummary($panel->dashboardPanel); ?>

    <?= $form->field($panel->dashboardPanel, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($panel->dashboardPanel, 'options')->textarea(['rows' => 6]) ?>

    <?= $form->field($panel->dashboardPanel, 'enabled')->checkbox() ?>

    <?php ActiveForm::end(); ?>

</div>
