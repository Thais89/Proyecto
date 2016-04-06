<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Recarga de saldo exitosa';
?>

<div class="container">
<div class="row">

<div class="col-sm-12 col-md-8 col-md-offset-2">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
		
	<div class="alert <?= 'alert-success' ?> text-center">
		<?= Html::encode('Saldo recargado: '.$model1->monto.' y Saldo actual: '.$model->saldo.' Bs') ?>
	</div>
	

</div>
</div>
</div>