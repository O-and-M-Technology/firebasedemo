<?php

namespace app\controllers;

use app\models\Peripherique;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeripheriqueController implements the CRUD actions for Peripherique model.
 */
class PeripheriqueController extends Controller
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
     * Lists all Peripherique models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Peripherique::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'idPeripherique' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peripherique model.
     * @param int $idPeripherique Id Peripherique
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPeripherique)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPeripherique),
        ]);
    }

    /**
     * Creates a new Peripherique model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Peripherique();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save(false)) {
                return $this->redirect(['view', 'idPeripherique' => $model->idPeripherique]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Peripherique model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idPeripherique Id Peripherique
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPeripherique)
    {
        $model = $this->findModel($idPeripherique);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPeripherique' => $model->idPeripherique]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Peripherique model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idPeripherique Id Peripherique
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPeripherique)
    {
        $this->findModel($idPeripherique)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peripherique model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idPeripherique Id Peripherique
     * @return Peripherique the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPeripherique)
    {
        if (($model = Peripherique::findOne(['idPeripherique' => $idPeripherique])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Convert from date to Timestamp
     **/
    public function beforeSave($insert)
    {
        
        $this->Date_creation = strtotime(date("Y-m-d"));
        $this->Utilisateur_idUtilisateur = 1;
        
        return parent::beforeSave($insert);
    }
}
