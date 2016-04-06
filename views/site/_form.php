<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="usuarios-form row">

    <div class="col-sm-12 col-md-6">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>    
        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-12 col-md-6">
        <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Cuenta' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        </div>
    </div>
    </div>

</div>
<?php ActiveForm::end(); ?>