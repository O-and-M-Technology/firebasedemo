<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Utilisateur */

$this->title = 'Update Utilisateur: ' . $model->idUtilisateur;
$this->params['breadcrumbs'][] = ['label' => 'Utilisateurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUtilisateur, 'url' => ['view', 'idUtilisateur' => $model->idUtilisateur]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="utilisateur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
