<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Historique;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historiques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serre-index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card avtivity-card">
                    <div class="card-body">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <?php Pjax::begin(); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                // 'idHistorique',
                                // 'Temps',
                                'Valeur',
                                'Temps_creation',
                                [
                                    'label' => 'Perepherique',
                                    'value' => function ($model) {
                                        return $model->peripheriqueIdPeripherique->Nom  ;
                                    },
                    
                                ],
                                [
                                    'label' => 'Serre',
                                    'value' => function ($model) {
                                        return $model->peripheriqueIdPeripherique->serreIdSerre->Nom  ;
                                    },
                    
                                ],
                                //'Utilisateur_idUtilisateur',
                                [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, Historique $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'idHistorique' => $model->idHistorique]);
                                    }
                                ],
                            ],
                        ]); ?>

                        <?php Pjax::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>