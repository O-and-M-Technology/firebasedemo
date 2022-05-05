<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Serre */

$this->title = $model->idSerre;
$this->params['breadcrumbs'][] = ['label' => 'Serres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="serre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idSerre' => $model->idSerre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idSerre' => $model->idSerre], [
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
            'idSerre',
            'Nom',
            'Adresse',
            'Date_creation',
            'Surface',
            'Utilisateur_idUtilisateur',
        ],
    ]) ?>

</div>
