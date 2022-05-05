<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peripherique */

$this->title = $model->idPeripherique;
$this->params['breadcrumbs'][] = ['label' => 'Peripheriques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="serre-index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card avtivity-card">
                    <div class="card-body">

                        <h1><?= Html::encode($this->title) ?></h1>

                        <p>
                            <?= Html::a('Update', ['update', 'idPeripherique' => $model->idPeripherique], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'idPeripherique' => $model->idPeripherique], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'idPeripherique',
                                'Nom',
                                'Date_creation',
                                'Type',
                                'Active',
                                'Serre_idSerre',
                                'Utilisateur_idUtilisateur',
                                'Code_HTML',
                                'IconSvg:ntext',
                            ],
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>