<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Recuperar cuenta';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h2>Recuperar cuenta</h2>
			<p>Ingresa tu correo electrónico para recuperar la contraseña</p>
			<?php $form = ActiveForm::begin([
        		'id' => 'recuperar-cuenta-form',
        		'layout' => 'horizontal',
        		'options' => ['class' => 'form-horizontal'],        
    		]); ?>

        	<?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('') ?>

        	<div class="form-group">
            	<div class="col-md-12">
                	<?= Html::submitButton('Recuperar Cuenta', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            	</div>
        	</div>

    		<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>