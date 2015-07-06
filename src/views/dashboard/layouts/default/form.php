<?php

use cornernote\dashboard\layouts\DefaultLayout;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/**
 * @var $this View
 * @var $layout DefaultLayout
 * @var $form ActiveForm
 */

?>


<?= $form->field($layout, 'columns')->dropDownList($layout->getColumnOpts(), ['prompt' => '']) ?>
