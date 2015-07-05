<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ButtonDropdown;
use yii\grid\GridView;
use cornernote\returnurl\ReturnUrl;

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
            <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('dashboard', 'Create') . ' ' . Yii::t('dashboard', 'Dashboard'), ['create', 'ru' => ReturnUrl::getToken()], ['class' => 'btn btn-success']) ?>
            <?= Html::button('<span class="fa fa-search"></span> ' . Yii::t('dashboard', 'Search') . ' ' . Yii::t('dashboard', 'Dashboards'), ['class' => 'btn btn-info', 'data-toggle' => 'modal', 'data-target' => '#dashboard-searchModal']) ?>
        </p>

    </div>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
        <?= GridView::widget([
            'layout' => '{summary}{pager}{items}{pager}',
            'dataProvider' => $dataProvider,
            'pager' => [
                'class' => yii\widgets\LinkPager::className(),
                'firstPageLabel' => Yii::t('dashboard', 'First'),
                'lastPageLabel' => Yii::t('dashboard', 'Last'),
            ],
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\ActionColumn',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        // using the column name as key, not mapping to 'id' like the standard generator
                        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                        $params[0] = Yii::$app->controller->id ? Yii::$app->controller->id . '/' . $action : $action;
                        $params['ru'] = ReturnUrl::getToken();
                        return Url::toRoute($params);
                    },
                    'contentOptions' => ['nowrap' => 'nowrap']
                ],
                'id',
                'name',
                'layout',
                'sort',
                'options:ntext',
                'enabled',
            ],
        ]); ?>
    </div>

</div>