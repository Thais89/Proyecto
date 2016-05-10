<?php 
    use yii\helpers\Html;
    use yii\bootstrap\Nav; 
    use yii\grid\GridView;
?>


<?php $this->beginContent("@app/views/layouts/main.php"); ?>
<div class="container-fluid">
    <?php 
      $controller = Yii::$app->controller;
      $default_controller = Yii::$app->defaultRoute;
      $isDefault = ( $controller->id === $default_controller ) ? true : false;
      
      if (! $isDefault ) :
    ?>
    <div class="container">
    <div class="row">
      <h3 class="user-name">Bienvenido/a <?php echo Yii::$app->user->identity->username; ?></h3>
    </div>

    <div class="row">
        <div class="col-md-4">
        <div class="panel panel-primary user-panel">
            <div class="panel-heading text-center user-title">
                Datos
            </div>
            <div class="panel-body">
                <?php echo Nav::widget([
                    'items' => [                        
                        [
                            'label' => 'Modificar Datos',
                            'url' => ['/usuarios/create','id'=>1]
                        ],                        
                    ],
                    'options' => ['class' =>''], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>
        </div>        
    </div>

    <div class="row">
      <hr>
    </div>
    
    <div class="row">
        <div class="col-md-12">
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
  <?php endif; ?>

  <div class="<?php echo ($isDefault) ? '' : 'col-md-12'; ?>">
    <?= $content ?>
  </div>
</div>

<?php $this->endContent(); ?>