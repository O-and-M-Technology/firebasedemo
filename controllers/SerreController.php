<?php

namespace app\controllers;

use yii\filters\AccessControl;
use app\models\Serre;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SerreController implements the CRUD actions for Serre model.
 */
class SerreController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                // 'access' => [
                //     'class' => AccessControl::className(),
                //     'only' => ['*'],
                //     'rules' => [
                //         [
                //             'actions' => ['*'],
                //             'allow' => true,
                //             'roles' => ['@'],
                //         ],
                //     ],
                // ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Serre models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Serre::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idSerre' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Serre model.
     * @param int $idSerre Id Serre
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idSerre)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSerre),
        ]);
    }

    /**
     * Creates a new Serre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Serre();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idSerre' => $model->idSerre]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Serre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idSerre Id Serre
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idSerre)
    {
        $model = $this->findModel($idSerre);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSerre' => $model->idSerre]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Serre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idSerre Id Serre
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSerre)
    {
        $this->findModel($idSerre)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Serre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idSerre Id Serre
     * @return Serre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSerre)
    {
        if (($model = Serre::findOne(['idSerre' => $idSerre])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
