<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Peripherique;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peripheriques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serre-index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card avtivity-card">
                    <div class="card-body">
                        <h1>
                            <?= Html::encode($this->title) ?>
                            <?= Html::a('Cree Perepherique', ['create'], ['class' => 'btn btn-success', 'style' => 'float:right;margin-bottom:20px']) ?>
                        </h1>

                        <?php Pjax::begin(); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                // 'idPeripherique',
                                'Nom',
                                'Date_creation',
                                'Type',
                                'Active',
                                'Key',
                                [
                                    'label' => 'Serre',
                                    'value' => function ($model) {
                                        return $model->serreIdSerre->Nom;
                                    },
                    
                                ],
                                //'Utilisateur_idUtilisateur',
                                //'Code_HTML',
                                //'IconSvg:ntext',
                                [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, Peripherique $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'idPeripherique' => $model->idPeripherique]);
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