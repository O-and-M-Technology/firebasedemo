<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Serre */

$this->title = 'Create Serre';
$this->params['breadcrumbs'][] = ['label' => 'Serres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card avtivity-card">
                <div class="card-body">

                    <h1><?= Html::encode($this->title) ?></h1>

                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
