<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Inicio de Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-login">
<div class="row">
<div class="col-sm-12 col-md-6">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'options' => ['class' => 'form-horizontal'],        
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Correo') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

        <div class="row">
            <div class="col-md-6 text-right">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Recuerdame') ?>
            </div>

            <div class="col-md-6 text-left">
                <?= Html::a('Recuperar cuenta', 'recuperar-cuenta',['class'=>'']); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11 text-center">
                <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    
</div>
<div class="col-sm-12 col-md-6 text-center">
    <img src="<?= Yii::$app->request->baseUrl . '/img/delivery.jpg';?>" alt="DeliverySC" >
</div>
</div>
</div>
