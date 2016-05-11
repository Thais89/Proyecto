<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Confirmar recuperación de contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    
    <?php $form = ActiveForm::begin([
        'id' => 'recuperacion-password',
        'layout' => 'horizontal',
        'options' => ['class' => 'form-horizontal'],        
    ]); ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11 text-center">
                <?= Html::submitButton('Cambiar Contraseña', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    
</div>
</div>
</div>
