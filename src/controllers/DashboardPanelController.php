<?php

namespace cornernote\dashboard\controllers;

use cornernote\dashboard\models\DashboardPanel;
use cornernote\dashboard\models\search\DashboardPanelSearch;
use cornernote\dashboard\Module;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use cornernote\dashboard\components\DashboardPanelAccess;

/**
 * DashboardPanelController implements the CRUD actions for DashboardPanel model.
 */
class DashboardPanelController extends Controller
{

    /**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		if (!$updateRoles = Module::getInstance()->updateRoles) {
			return [];
		}
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'actions' => ['view'],
						'roles' => ['@']
					],
					[
						'allow' => true,
						'actions' => ['index', 'create', 'update', 'delete'],
						'roles' => $updateRoles
					]
				]
			]
		];
	}

	/**
     * Creates a new DashboardPanel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DashboardPanel;
        //$model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Dashboard Panel has been created.'));
            return $this->redirect(['update', 'id' => $model->id]);
        } elseif (!\Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->get());
        }

        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing DashboardPanel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$model->scenario = 'update';

        $data = Yii::$app->request->post();
        if ($data && $model->panel->load($data) && $model->panel->validate()) {
            $model->options = $model->panel->getOptions();
            if ($model->save(false)) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Dashboard Panel has been updated.'));
                return $this->redirect(['dashboard/view', 'id' => $model->dashboard->id]);
            }
        }

        return $this->render('update', compact('model'));
    }


    /**
     * Deletes an existing DashboardPanel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Dashboard Panel has been deleted.'));

        return $this->redirect(['dashboard/view', 'id' => $model->dashboard_id]);
    }

    /**
     * Finds the DashboardPanel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
	 * If defined for panel allowRoles, check user access
     * @param string $id
     * @return DashboardPanel the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {

		if (($model = DashboardPanel::findOne($id)) !== null) {

			if (!DashboardPanelAccess::userHasAccess($model->name)) {
				throw new HttpException(401, 'You are not allowed to access this page.');
			}
			return $model;
		}

		throw new HttpException(404, 'The requested page does not exist.');
	}
}
