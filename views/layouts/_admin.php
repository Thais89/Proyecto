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
                Usuarios
            </div>
            <div class="panel-body">
                <?php echo Nav::widget([
                    'items' => [                        
                        [
                          'label' => 'Registrar Administrador',
                            'url' => ['/usuarios/create','id'=>1]
                        ],
                        [
                            'label' => 'Registrar Repartidor',
                            'url' => ['/usuarios/create','id'=>2]
                        ],
                        [
                           'label' => 'Registrar Operador',
                            'url' => ['/usuarios/create','id'=>3]
                        ],
                        [
                           'label' => 'Listado Usuarios',
                            'url' => ['/usuarios/listado']
                        ],
                    ],
                    'options' => ['class' =>''], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-success user-panel">
            <div class="panel-heading text-center user-title">
                Tabuladores
            </div>
            <div class="panel-body">
                <?php echo Nav::widget([
                    'items' => [                        
                        [
                          'label' => 'Crear tabulador',
                            'url' => ['/site/cargar','id'=>Yii::$app->user->identity->id]
                        ],
                        [
                            'label' => 'Modificar tabulador',
                            'url' => ['/site/cargarmercado','id'=>Yii::$app->user->identity->id]
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

    
    </div>
  <?php endif; ?>

  <div class="<?php echo ($isDefault) ? '' : 'col-md-12'; ?>">
    <?= $content ?>
  </div>
</div>

<?php $this->endContent(); ?>