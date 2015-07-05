<?php

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\Dashboard $model
 */

$this->title = Yii::t('dashboard', 'Create Dashboard');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
