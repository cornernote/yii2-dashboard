<?php

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\DashboardPanel $model
 */

$this->title = Yii::t('dashboard', 'Create Dashboard Panel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Dashboard Panels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-panel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
