<?php use yii\bootstrap\Nav; ?>


<?php $this->beginContent("@app/views/layouts/main.php"); ?>
<div class="container-fluid">
  <div class="col-md-2">
    <?php echo Nav::widget([
    'items' => [
    '<li class="header">Menú Usuario</li>',
        [
            'label' => 'Modificar Datos',
            'url' => ['/usuarios/update','id'=>Yii::$app->user->identity->id]
        ],
        '<li class="header">Cargar Saldo</li>',
         [
            'label' => 'Carga con deposito',
            'url' => ['#','id'=>Yii::$app->user->identity->id]
        ],
         [
            'label' => 'Carga por Mercado Pago',
            'url' => ['#','id'=>Yii::$app->user->identity->id]
        ],
          '<li class="header">Encomienda</li>',
         [
            'label' => 'Realizar Encomienda',
            'url' => ['#','id'=>Yii::$app->user->identity->id]
        ],
         [
            'label' => 'Modificar Encomienda',
            'url' => ['#','id'=>Yii::$app->user->identity->id]
        ],
         [
            'label' => 'Chequeo de encomienda',
            'url' => ['#','id'=>Yii::$app->user->identity->id]
        ],
        
        
    ],
    'options' => ['class' =>'nav-pills nav-stacked'], // set this to nav-tab to get tab-styled navigation
]); ?>
  </div>
  <div class="col-md-10">
    <?php echo $content; ?>
  </div>
</div>

<?php $this->endContent(); ?>
