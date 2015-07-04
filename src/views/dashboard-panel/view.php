<?php

use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var cornernote\dashboard\models\DashboardPanel $model
 */

$this->title = Yii::t('app', 'Dashboard Panel') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboard Panels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-panel-view">

    <?= $this->render('_menu', compact('model')); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'dashboard_id',
            'position',
            'sort',
            'panel',
            'options:ntext',
            'enabled',
        ],
    ]); ?>

</div>
