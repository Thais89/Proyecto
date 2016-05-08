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
        <?= Html::a('Update', ['update', 'id' => $model->encomiendaID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->encomiendaID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'encomiendaID',
            'DireccionOrigen',
            'DireccionDestino',
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

</div>
