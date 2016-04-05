<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usuarioID') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?php // echo $form->field($model, 'cedula') ?>

    <?php // echo $form->field($model, 'direcion') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'fechaRegistro') ?>

    <?php // echo $form->field($model, 'ultimoLogin') ?>

    <?php // echo $form->field($model, 'Saldo') ?>

    <?php // echo $form->field($model, 'authKey') ?>

    <?php // echo $form->field($model, 'accessToken') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
