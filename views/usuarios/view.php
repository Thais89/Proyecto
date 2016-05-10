<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = "Datos Actualizados";
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php   
        if (!\Yii::$app->user->isGuest) 
        {
            if(User::isUserAdmin(Yii::$app->user->identity->usuarioID))
            {?>
                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->usuarioID], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Borrar', ['delete', 'id' => $model->usuarioID], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => '¿Estas seguro que quieres eliminar este item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            <?php
            }
        }?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:email',
            'password',
            'nombre',
            'apellido',
            'cedula',
            'direccion',
            'telefono',
            'estado',
            'fechaRegistro',
            'ultimoLogin',
            'saldo'            
        ],
    ]) ?>

</div>
