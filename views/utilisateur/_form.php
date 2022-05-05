<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Utilisateur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilisateur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Prenom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Identifiant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->textInput() ?>

    <?= $form->field($model, 'Role')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
