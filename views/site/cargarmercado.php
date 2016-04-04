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

$model = new TransaccionUsuario();
$this->title = 'Tarjeta de Credito';
$this->params['breadcrumbs'][] = $this->title;
$array = array('Visa','Mastercard')
?>
<div>
    <div class="col-sm-12 col-md-12 fa-pull-right">
        <h4><?= Html::encode('Saldo a favor: '.Yii::$app->user->identity->Saldo.' Bs') ?></h4>
    </div>
    <div class="col-sm-12 col-md-6">
    	    <h2><?= Html::encode($this->title) ?></h2>
    	

    	 <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-5 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'OrigenBanco')->dropDownList($array) ?>
        <?= $form->field($model, 'NumeroReferencia')->textInput(array('placeholder' => 'Nª Deposito ó Tranferencia')); ?>
        <?= $form->field($model, 'monto')->textInput(array('placeholder' => 'Bs. F')); ?>
        <?= $form->field($model, 'transaccionID')->dropDownList(
            ArrayHelper::map(Transacciones::find()->all(),'transaccionID','transaccion')
        ) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Cargar Saldo',['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>	
    </div>
</div>