<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Encomiendas */

$this->title = 'Update Encomiendas: ' . $model->encomiendaID;
$this->params['breadcrumbs'][] = ['label' => 'Encomiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->encomiendaID, 'url' => ['view', 'id' => $model->encomiendaID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encomiendas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
