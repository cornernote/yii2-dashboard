<?php

use cornernote\dashboard\panels\TextPanel;
use yii\helpers\VarDumper;
use yii\web\View;

/**
 * @var $panel TextPanel
 * @var $this View
 */

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?= $panel->dashboardPanel->name ?>
            <div class="pull-right">
                <?= $this->render('@cornernote/dashboard/views/dashboard/panels/_buttons', ['panel' => $panel]) ?>
            </div>
        </h3>
    </div>
    <div class="panel-body">
        <?php VarDumper::dump($panel->dashboardPanel->options); ?>
    </div>
</div>