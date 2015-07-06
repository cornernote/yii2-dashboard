<?php

use cornernote\dashboard\panels\WelcomePanel;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $panel WelcomePanel
 * @var $this View
 */
?>

<h3>
    <?= $panel->dashboardPanel->name ?>
    <?= Html::a('<span class="glyphicon glyphicon-pencil small"></span>', ['dashboard-panel/update', 'id' => $panel->dashboardPanel->id]) ?>
</h3>
<div class="well">
    <?= $panel->message; ?>
</div>