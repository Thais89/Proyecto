<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Confirmación de Usuario';
?>

<div class="container">
<div class="row">

<div class="col-sm-12 col-md-8 col-md-offset-2">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>
		
	<div class="alert <?= ($estado == true) ? 'alert-success' : 'alert-danger' ?> text-center">
		<?= $mensaje ?>
	</div>
	

</div>
</div>
</div>