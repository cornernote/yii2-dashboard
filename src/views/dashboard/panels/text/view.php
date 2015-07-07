<?php

use cornernote\dashboard\panels\TextPanel;
use yii\web\View;

/**
 * @var $panel TextPanel
 * @var $this View
 */

echo '<h2>';
echo $panel->dashboardPanel->name;
echo $this->render('@cornernote/dashboard/views/dashboard/panels/_buttons', ['panel' => $panel]);
echo '</h2>';
?>

<div class="well">
    <?= Yii::$app->formatter->asNtext($panel->text); ?>
</div>