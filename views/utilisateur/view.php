<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Utilisateur */

$this->title = $model->idUtilisateur;
$this->params['breadcrumbs'][] = ['label' => 'Utilisateurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="utilisateur-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idUtilisateur' => $model->idUtilisateur], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUtilisateur' => $model->idUtilisateur], [
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
            'idUtilisateur',
            'Nom',
            'Prenom',
            'Identifiant',
            'Password:ntext',
            'Role',
            'Derniere_authentification',
        ],
    ]) ?>

</div>
