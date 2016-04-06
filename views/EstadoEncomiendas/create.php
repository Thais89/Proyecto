<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoEncomiendas */

$this->title = 'Create Estado Encomiendas';
$this->params['breadcrumbs'][] = ['label' => 'Estado Encomiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-encomiendas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
