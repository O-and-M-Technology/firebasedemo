<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Utilisateur;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilisateurs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card avtivity-card">
                <div class="card-body">

                    <h1>
                        <?= Html::encode($this->title) ?>
                        <?= Html::a('Create Utilisateur', ['create'], ['class' => 'btn btn-success' , 'style'=> 'float:right;margin-bottom:20px']) ?>
                    </h1>


                    <?php Pjax::begin(); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'Nom',
                            'Prenom',
                            'Identifiant',
                            'Password:ntext',
                            //'Role',
                            //'Derniere_authentification',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Utilisateur $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'idUtilisateur' => $model->idUtilisateur]);
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