<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\User;
use app\models\Usuarios;
use app\models\TransaccionUsuario;
use app\models\Transacciones;
use dosamigos\datepicker\DatePicker;

$model = new TransaccionUsuario();
?>
<div>

<?php /* Division de Regarga de Saldo*/ 

    $this->title = 'Deposito / Transferencia'; 
    $array1 = array(
                    'Mercantil'  => 'Mercantil',
                    'Provincial' => 'Provincial',
                    'Venezuela'  => 'Venezuela')
?>
    <div class="col-sm-12 col-md-12 fa-pull-right">
        <h4><?= Html::encode('Saldo a favor: '.Yii::$app->user->identity->Saldo.' Bs') ?></h4>
    </div>
    <div class="col-sm-12 col-md-12 text-center">
        <h2><?= Html::encode($this->title) ?></h2>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-4 control-label'],
            ],
        ]); ?>
        
        <?= $form->field($model, 'origenBanco')->dropDownList($array1) ?>
        <?= $form->field($model, 'numeroReferencia')->textInput(array('placeholder' => 'Nª Deposito ó Transferencia')); ?>
        <?= $form->field($model, 'fecha')->widget(
            DatePicker::className(), [
                // inline too, not bad
                 'inline' => false,
                 // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                    
                ]
        ]);?>

        

        <div class="form-group">
            <?= Html::submitButton('Cargar Saldo',['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?> 
    </div>

</div>