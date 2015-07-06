<?php

namespace cornernote\dashboard\controllers;

use cornernote\dashboard\models\Dashboard;
use cornernote\dashboard\models\DashboardPanel;
use cornernote\dashboard\models\search\DashboardSearch;
use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use yii\filters\AccessControl;
use cornernote\returnurl\ReturnUrl;

/**
 * DashboardController implements the CRUD actions for Dashboard model.
 */
class DashboardController extends Controller
{

    /**
     * @inheritdoc
     */
    //public function behaviors()
    //{
    //    return [
    //        'access' => [
    //            'class' => AccessControl::className(),
    //            'rules' => [
    //                [
    //                    'allow' => true,
    //                    'actions' => ['index', 'view', 'create', 'update', 'delete'],
    //                    'roles' => ['@']
    //                ]
    //            ]
    //        ]
    //    ];
    //}

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Lists all Dashboard models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DashboardSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Dashboard model.
     * @param string $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', compact('model'));
    }

    /**
     * Creates a new Dashboard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dashboard;
        //$model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Dashboard has been created.'));
            return $this->redirect(['view', 'id' => $model->id, 'ru' => ReturnUrl::getRequestToken()]);
        } elseif (!\Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->get());
        }

        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing Dashboard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$model->scenario = 'update';

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->layout->load($data) && $model->layout->validate()) {
                $model->options = $model->layout->getOptions();
                if ($model->save(false)) {
                    $model->sortPanels($data['DashboardPanelSort']);
                    Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Dashboard has been updated.'));
                    return $this->redirect(['dashboard/view', 'id' => $model->id]);
                }
            }
        }


        return $this->render('update', compact('model'));
    }


    /**
     * Deletes an existing Dashboard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Dashboard has been deleted.'));

        return $this->redirect(ReturnUrl::getUrl(['index']));
    }

    /**
     * Finds the Dashboard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Dashboard the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dashboard::findOne($id)) !== null) {
            return $model;
        }
        throw new HttpException(404, 'The requested page does not exist.');
    }
}
