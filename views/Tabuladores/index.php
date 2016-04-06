<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TabuladoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tabuladores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabuladores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabuladores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tabuladorID',
            'tabulador',
            'descripcion',
            'precio',
            'encomiendaID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
