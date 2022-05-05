<?php

namespace app\controllers;

use app\models\Historique;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HistoriqueController implements the CRUD actions for Historique model.
 */
class HistoriqueController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
     * Lists all Historique models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Historique::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idHistorique' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Historique model.
     * @param int $idHistorique Id Historique
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idHistorique)
    {
        return $this->render('view', [
            'model' => $this->findModel($idHistorique),
        ]);
    }

    /**
     * Creates a new Historique model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Historique();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idHistorique' => $model->idHistorique]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Historique model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idHistorique Id Historique
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idHistorique)
    {
        $model = $this->findModel($idHistorique);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idHistorique' => $model->idHistorique]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Historique model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idHistorique Id Historique
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idHistorique)
    {
        $this->findModel($idHistorique)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Historique model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idHistorique Id Historique
     * @return Historique the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idHistorique)
    {
        if (($model = Historique::findOne(['idHistorique' => $idHistorique])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
