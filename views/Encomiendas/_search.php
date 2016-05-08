<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EncomiendasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encomiendas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'encomiendaID') ?>

    <?= $form->field($model, 'DireccionOrigen') ?>

    <?= $form->field($model, 'DireccionDestino') ?>

    <?= $form->field($model, 'distancia') ?>

    <?= $form->field($model, 'tiempoEstimado') ?>

    <?php // echo $form->field($model, 'receptorNombre') ?>

    <?php // echo $form->field($model, 'receptorCedula') ?>

    <?php // echo $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'fechaSolicitud') ?>

    <?php // echo $form->field($model, 'fechaRecepcion') ?>

    <?php // echo $form->field($model, 'fechaEntrega') ?>

    <?php // echo $form->field($model, 'usuarioID') ?>

    <?php // echo $form->field($model, 'estadoEncomiendaID') ?>

    <?php // echo $form->field($model, 'tabuladorID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
