<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EncomiendasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encomiendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomiendas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Encomienda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'encomiendaID',
            'DireccionOrigen',
            'DireccionDestino',
            'distancia',
            'tiempoEstimado',
            // 'receptorNombre',
            // 'receptorCedula',
            // 'precio',
            // 'fechaSolicitud',
            // 'fechaRecepcion',
            // 'fechaEntrega',
            // 'usuarioID',
            // 'estadoEncomiendaID',
            // 'tabuladorID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
