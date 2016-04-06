<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tabuladores */

$this->title = $model->tabuladorID;
$this->params['breadcrumbs'][] = ['label' => 'Tabuladores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabuladores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tabuladorID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tabuladorID], [
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
            'tabuladorID',
            'tabulador',
            'descripcion',
            'precio',
            'encomiendaID',
        ],
    ]) ?>

</div>
