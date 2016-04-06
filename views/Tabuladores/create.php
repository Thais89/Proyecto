<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tabuladores */

$this->title = 'Create Tabuladores';
$this->params['breadcrumbs'][] = ['label' => 'Tabuladores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabuladores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
