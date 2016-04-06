<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tabuladores */

$this->title = 'Update Tabuladores: ' . $model->tabuladorID;
$this->params['breadcrumbs'][] = ['label' => 'Tabuladores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tabuladorID, 'url' => ['view', 'id' => $model->tabuladorID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabuladores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
