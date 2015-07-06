<?php

use cornernote\dashboard\panels\WelcomePanel;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\View;

/**
 * @var $panel WelcomePanel
 * @var $this View
 */
?>

<h3>
    <?= $panel->dashboardPanel->name ?>
</h3>
<div class="well">
    <?php VarDumper::dump(json_decode($panel->dashboardPanel->options, true)); ?>
</div>