<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */

$array1 = array('0'  => 'Inhabilitar',
                 '1' => 'Habilitar')

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

        <?= $form->field($model, 'estado')->dropDownList($array1) ?>
    </div>

    <div class="col-md-12 form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>

<?php ActiveForm::end(); ?>