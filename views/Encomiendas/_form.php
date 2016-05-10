<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use app\models\Usuarios;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Encomiendas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encomiendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DireccionOrigen')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'DireccionDestino')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'distancia')->textInput() ?>

    <?= $form->field($model, 'tiempoEstimado')->textInput() ?>

    <?= $form->field($model, 'receptorNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receptorCedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= 


    //$form->field($model, 'fechaSolicitud')->hiddenInput(['value'=>new CDbExpression('NOW()')])->label(false) 

    $form->field($model, 'fechaRecepcion')->widget(DateTimePicker::className(), [
    'language' => 'es',
    'size' => 'ms',
    //'template' => '{input}',
    //'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd hh:mm:ss',
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
        'format' => 'yyyy-mm-dd hh:mm:ss',
        //'todayBtn' => true
    ]
]); ?>

    <?= 

    
    $form->field($model, 'usuarioID')->hiddenInput(['value'=> '1'])->label(false) ?>

    <?= $form->field($model, 'estadoEncomiendaID')->hiddenInput(['value'=> '1'])->label(false) ?>

    <?= $form->field($model, 'tabuladorID')->hiddenInput(['value'=> '1'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
