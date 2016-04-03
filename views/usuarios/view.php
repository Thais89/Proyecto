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
            if(User::isUserAdmin(Yii::$app->user->identity->UsuarioID))
            {?>
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->UsuarioID], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->UsuarioID], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
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
            'direcion',
            'telefono',
            'estado',
            'fechaRegistro',
            'ultimoLogin',
            'Saldo'            
        ],
    ]) ?>

</div>
