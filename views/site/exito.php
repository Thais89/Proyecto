<?php
use yii\helpers\Html;
?>
<div>
	<h1>Recarga Exitosa</h1>
	<h5><?= Html::encode('Saldo actual: '.Yii::$app->user->identity->Saldo.' Bs') ?></h5>
</div>