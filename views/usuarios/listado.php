<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="usuarios-index container">

<div class="row">
    <h2>Listado de Usuarios registrados</h2>
</div>
<div class="row">

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
