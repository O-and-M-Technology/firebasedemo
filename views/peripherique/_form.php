<?php

use app\models\Serre;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Peripherique */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peripherique-form">

    <?php $form = ActiveForm::begin(); ?>

    <? // $form->field($model, 'Key')->textInput(['maxlength' => true , 'value' =>  md5(rand()) , 'disabled' => 'true' ]) ?>
    
    <?= $form->field($model, 'Nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->dropDownList([ 'controleur' => 'Controleur', 'detecteur' => 'Detecteur', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Active')->dropDownList([ 'oui' => 'Oui', 'non' => 'Non', ], ['prompt' => '']) ?>

    <?// $form->field($model, 'Serre_idSerre')->textInput() ?>

    <?php 
        use yii\helpers\ArrayHelper;
        $listData=ArrayHelper::map(Serre::find()->all(),'idSerre','Nom');

        echo $form->field($model, 'Serre_idSerre')->dropDownList(
                $listData,
                ['prompt'=>'Select...']
                );
        ?>

    <?// $form->field($model, 'Utilisateur_idUtilisateur')->textInput() ?>

    <?= $form->field($model, 'Code_HTML')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IconSvg')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
