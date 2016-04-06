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

    <?= $form->field($model, 'latitudOrigen') ?>

    <?= $form->field($model, 'longitudOrigen') ?>

    <?= $form->field($model, 'latitudDestino') ?>

    <?= $form->field($model, 'longitudDestino') ?>

    <?php // echo $form->field($model, 'distancia') ?>

    <?php // echo $form->field($model, 'cantIDadDocumentos') ?>

    <?php // echo $form->field($model, 'receptorNombre') ?>

    <?php // echo $form->field($model, 'receptorCedula') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'fechaSolicitud') ?>

    <?php // echo $form->field($model, 'fechaRecepcion') ?>

    <?php // echo $form->field($model, 'fechaEntrega') ?>

    <?php // echo $form->field($model, 'usuarioID') ?>

    <?php // echo $form->field($model, 'estadoEncomiendaID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
