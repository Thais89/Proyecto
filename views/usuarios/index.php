<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index container">
<div class="row">
<div class="col-sm-12 col-md-12">
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <h2>Bienenido al index</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usuarioID',
            'email:email',
            'password',
            'nombre',
            'apellido',
            // 'cedula',
            // 'direcion',
            // 'telefono',
            // 'estado',
            // 'fechaRegistro',
            // 'ultimoLogin',
            // 'Saldo',
            // 'authKey',
            // 'accessToken',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
