<?php use yii\bootstrap\Nav; ?>

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
                Usuario
            </div>
            <div class="panel-body">
                <?php echo Nav::widget([
                    'items' => [                        
                        [
                            'label' => 'Modificar Datos',
                            'url' => ['/usuarios/update','id'=>Yii::$app->user->identity->id]
                        ],
                        [
                            'label' => 'Inhabilitar Usuario',
                            'url' => ['/usuarios/inhabilitar','id'=>Yii::$app->user->identity->id]
                        ],
                    ],
                    'options' => ['class' =>''], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="panel panel-info user-panel">
            <div class="panel-heading text-center user-title">
                Encomiendas
            </div>
            <div class="panel-body">
                <?php echo Nav::widget([
                    'items' => [                        
                        [
                            'label' => 'Asignar repartidor a Encomienda',
                            'url' => ['/encomiendas/asignar','id'=>Yii::$app->user->identity->id]
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
            <h2>
                &iquest;Como envíar?
            </h2>
        </div>
        <div class="col-sm-12 col-md-3">
            <h2>Paso 1:</h2>
            <p>
                Registrate e inicia sesión
            </p>
        </div>
        <div class="col-sm-12 col-md-3">
            <h2>Paso 2:</h2>
            <p>
                Indica la ubicación y fecha de envío
            </p>
        </div>
        <div class="col-sm-12 col-md-3">
            <h2>Paso 3:</h2>
            <p>
                Indica el detalle de la encomienda
            </p>
        </div>
        <div class="col-sm-12 col-md-3">
            <h2>Paso 4:</h2>
            <p>
                Realiza tu pago y confirma los datos de envío
            </p>
        </div>
    </div>
    </div>
  <?php endif; ?>

  <div class="<?php echo ($isDefault) ? '' : 'col-md-12'; ?>">
    <?= $content ?>
  </div>
</div>


<?php $this->endContent(); ?>
