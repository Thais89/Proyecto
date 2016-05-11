<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Encomiendas */

$this->title = $model->encomiendaID;
$this->params['breadcrumbs'][] = ['label' => 'Encomiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomiendas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->encomiendaID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->encomiendaID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro de que desea eliminar la encomienda?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'encomiendaID',
            'direccionOrigen',
            'direccionDestino',
            'distancia',
            'tiempoEstimado',
            'receptorNombre',
            'receptorCedula',
            'precio',
            'fechaSolicitud',
            'fechaRecepcion',
            'fechaEntrega',
            'usuarioID',
            'estadoEncomiendaID',
            'tabuladorID',
        ],
    ]) ?>
    <center><?= Html::a('Ir a Encomiendas', ['index'], ['class' => 'btn btn-primary']) ?></center>
</div>
