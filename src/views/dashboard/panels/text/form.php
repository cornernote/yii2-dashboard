<?php

use cornernote\dashboard\panels\TextPanel;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/**
 * @var $panel TextPanel
 * @var $this View
 * @var $form ActiveForm
 */
?>

<?= $form->field($panel, 'text')->textarea(['rows' => 6]) ?>

