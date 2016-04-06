<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Registro de Usuarios';
?>

<div class="usuarios-create container">
<div class="row">

<div class="col-sm-12 col-md-10 col-md-offset-1">
    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>