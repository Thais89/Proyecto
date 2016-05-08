<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\Encomiendas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encomiendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DireccionOrigen')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'DireccionDestino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distancia')->textInput() ?>

    <?= $form->field($model, 'tiempoEstimado')->textInput() ?>

    <?= $form->field($model, 'receptorNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receptorCedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'fechaSolicitud')->textInput() ?>

    <?= $form->field($model, 'fechaRecepcion')->widget(DateTimePicker::className(), [
    'language' => 'es',
    'size' => 'ms',
    //'template' => '{input}',
    //'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'dd MM yyyy - HH:ii P',
        //'todayBtn' => true
    ]
]); ?>

    <?= $form->field($model, 'fechaEntrega')->widget(DateTimePicker::className(), [
    'language' => 'es',
    'size' => 'ms',
    //'template' => '{input}',
    //'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'dd MM yyyy - HH:ii P',
        //'todayBtn' => true
    ]
]); ?>

    <?= $form->field($model, 'usuarioID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estadoEncomiendaID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tabuladorID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
