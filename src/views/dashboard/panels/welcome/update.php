<?php

use cornernote\dashboard\panels\WelcomePanel;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/**
 * @var $panel WelcomePanel
 * @var $this View
 * @var $form ActiveForm
 */
?>

<?= $form->field($panel->dashboardPanel, 'options')->textarea(['rows' => 6]) ?>

