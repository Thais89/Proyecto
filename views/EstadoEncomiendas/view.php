<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoEncomiendas */

$this->title = $model->estadoEncomiendasID;
$this->params['breadcrumbs'][] = ['label' => 'Estado Encomiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-encomiendas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->estadoEncomiendasID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->estadoEncomiendasID], [
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
            'estadoEncomiendasID',
            'estado',
            'descripcion',
        ],
    ]) ?>

</div>
