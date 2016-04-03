<?php
use yii\helpers\Html;
?>
<div>
	<h1>Lo sentimos la recarga no se realizo</h1>
	
	<h5><?= Html::encode('Saldo actual: '.Yii::$app->user->identity->Saldo.' Bs') ?></h5>
</div>