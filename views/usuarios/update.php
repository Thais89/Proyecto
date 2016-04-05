<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Actualizar Datos: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usuarioID, 'url' => ['view', 'id' => $model->usuarioID]];
$this->params['breadcrumbs'][] = 'Actualizar Datos';
?>
<div class="usuarios-update">
<div class="col-sm-12 col-md-8 col-md-offset-2">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
