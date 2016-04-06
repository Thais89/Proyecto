<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoEncomiendas */

$this->title = 'Update Estado Encomiendas: ' . $model->estadoEncomiendasID;
$this->params['breadcrumbs'][] = ['label' => 'Estado Encomiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->estadoEncomiendasID, 'url' => ['view', 'id' => $model->estadoEncomiendasID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-encomiendas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
