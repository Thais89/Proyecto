<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Recarga de saldo fallida';
?>

<div class="container">
<div class="row">

<div class="col-sm-12 col-md-8 col-md-offset-2">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
		
	<div class="alert <?= 'alert-danger' ?> text-center">
		<?= Html::encode('Verifique número de referencia y/o banco') ?>
	</div>
	

</div>
</div>
</div>