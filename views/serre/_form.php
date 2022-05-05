<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Serre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="serre-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'Nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Adresse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Date_creation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Surface')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Utilisateur_idUtilisateur')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
