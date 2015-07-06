<?php

use cornernote\dashboard\models\Dashboard;
use kartik\sortable\Sortable;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\web\View;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var cornernote\dashboard\models\Dashboard $model
 * @var cornernote\dashboard\models\search\DashboardSearch $searchModel
 */

$this->title = Yii::t('dashboard', 'Dashboards');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dashboard-index">

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('dashboard', 'Create') . ' ' . Yii::t('dashboard', 'Dashboard'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php
    $items = [];
    foreach (Dashboard::find()->orderBySort()->all() as $dashboard) {
        $dashboardDisplay = implode(' ', [
            Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['dashboard/view', 'id' => $dashboard->id], [
                'data-toggle' => 'tooltip',
                'title' => Yii::t('dashboard', 'View Dashboard'),
            ]),
            Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['dashboard/update', 'id' => $dashboard->id], [
                'data-toggle' => 'tooltip',
                'title' => Yii::t('dashboard', 'Update Dashboard'),
            ]),
            Html::a('<i class="glyphicon glyphicon-trash"></i>', ['dashboard/delete', 'id' => $dashboard->id], [
                'data-confirm' => Yii::t('dashboard', 'Are you sure to delete this dashboard?'),
                'data-method' => 'post',
                'data-toggle' => 'tooltip',
                'title' => Yii::t('dashboard', 'Delete Dashboard'),
            ]),
            '&nbsp;&nbsp;' . Html::tag('span', $dashboard->name, ['style' => !$dashboard->enabled ? 'text-decoration:line-through' : '']),
        ]);
        $items[] = [
            'options' => [
                'id' => 'dashboard-' . $dashboard->id,
                'class' => 'dashboard',
            ],
            'content' => $dashboardDisplay,
        ];
    }
    echo Sortable::widget([
        'id' => 'dashboard-sortable',
        'items' => $items,
        'pluginEvents' => [
            'sortupdate' => 'dashboardSort',
        ],
    ]);
    $this->registerJs('var dashboardSortUrl = "' . Url::to(['dashboard/sort']) . '"', View::POS_END);
    ?>

</div>