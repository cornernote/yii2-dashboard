<?php
/**
 * @var $panel \tests\app\dashboard\panels\ExamplePanel
 * @var $this \yii\web\View
 */
?>

<h3>
    <?= $panel->dashboardPanel->name ?>
    <?= $this->render('@cornernote/dashboard/views/dashboard/panels/_buttons', ['panel' => $panel]) ?>
</h3>
<div class="well">
    <?php \yii\helpers\VarDumper::dump($panel->dashboardPanel->options); ?>
</div>