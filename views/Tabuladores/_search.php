<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabuladoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tabuladores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tabuladorID') ?>

    <?= $form->field($model, 'tabulador') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'precio') ?>

    <?= $form->field($model, 'encomiendaID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
