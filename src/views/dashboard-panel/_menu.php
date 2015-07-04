<?php

use yii\helpers\Html;
use cornernote\returnurl\ReturnUrl;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\DashboardPanel $model
 */

?>

<!-- menu buttons -->
<p class='pull-left'>
    <?= Html::a('<span class="fa fa-arrow-left"></span> ' . Yii::t('app', 'Back'), ReturnUrl::getUrl(['index']), ['class' => 'btn btn-default']) ?>
    <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('app', 'View'), ['view', 'id' => $model->id, 'ru' => ReturnUrl::getRequestToken()], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('<span class="fa fa-pencil"></span> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id, 'ru' => ReturnUrl::getRequestToken()], ['class' => 'btn btn-info']) ?>
    <?= Html::a('<span class="fa fa-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id, 'ru' => ReturnUrl::getRequestToken()], [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
</p>

<div class="clearfix"></div>