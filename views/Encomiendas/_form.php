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

    <?= 

    $distancia = Yii::$app->request->post('distance');
    $tiempo = Yii::$app->request->post('time');
    $total = Yii::$app->request->post('todo');
    $document = Yii::$app->request->post('document');

    echo "distancia es "+$distancia;
    echo "tiempo es "+$tiempo;
    echo "total es "+$total;
    echo "los documentos son "+$document; ?>

    <?= $form->field($model, 'direccionOrigen')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccionDestino')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'distancia')->textInput(['maxlength' => true,'disabled' => true, 'value' => $distancia]) ?>

    <?= $form->field($model, 'tiempoEstimado')->textInput(['maxlength' => true,'disabled' => true, 'value' => $tiempo]) ?>

    <?= $form->field($model, 'receptorNombre')->textInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'receptorCedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput(['maxlength' => true,'disabled' => true, 'value' => $total]) ?>

    <?= 


    

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

    $id=Yii::$app->user->getId();    
    $form->field($model, 'usuarioID')->hiddenInput(['value'=> $id])->label(false) ?>

    <?= $form->field($model, 'estadoEncomiendaID')->hiddenInput(['value'=> '1'])->label(false) ?>

    <?= $form->field($model, 'tabuladorID')->hiddenInput(['value'=> $document])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
