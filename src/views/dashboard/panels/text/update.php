<?php

use cornernote\dashboard\panels\TextPanel;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\View;

/**
 * @var $panel TextPanel
 * @var $this View
 */
?>

<h2>
    <?= $panel->dashboardPanel->name ?>
    <?= $this->render('@cornernote/dashboard/views/dashboard/panels/_buttons', ['panel' => $panel]) ?>
</h2>
<div class="well">
    <?php VarDumper::dump($panel->dashboardPanel->options); ?>
</div>