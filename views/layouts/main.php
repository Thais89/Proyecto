<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Button;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    
    <div class="row">
        <div class="col-xs-6 col-md-4">
           
            <?= Html::a(Html::img("imagenes/logo.png",["class"=>"logo"]),["/site/index"])  ?>
        </div>
        <div class="col-xs-6 col-md-4">
            <p class="titulo">
            Delivery SC
            </p>
        </div>
        <div class="col-xs-6 col-md-2 col-md-offset-1">
            <a href='https://www.google.com' style='margin:auto; padding: auto;' target='_blank'><?= Html::img('imagenes/sociales/google.png', ['title'=>'Buscar en Google']) ?></a>
             <a href='https://www.google.com' style='margin:auto; padding: auto;' target='_blank'><?= Html::img('imagenes/sociales/twitter.png', ['title'=>'Buscar en Twitter']) ?></a>
        <a href='https://espanol.yahoo.com/' style='margin:auto; padding: auto;' target='_blank'><?= Html::img('imagenes/sociales/facebook.png', ['title'=>'Buscar en facebook']) ?></a>
           
            <?php  echo   Yii::$app->user->isGuest ? (
                Html::a("Iniciar Sesión",["/site/login"], ['class'=>'btn btn-primary btn-block']).
                "<br>¿No tienes cuenta? ".Html::a("Registrate",["/site/create"])
            ) : (
                 Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
               
            ); ?>
            
        </div>
    </div>

    <?php
    NavBar::begin([
        
    ]);
    echo Nav::widget([
        'options' => ['class' => 'nav nav-justified nav-pills'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Servicios', 'url' => ['/site/about']],
            ['label' => 'Acerca de nosotros', 'url' => ['/site/about']],
            ['label' => 'Como enviar', 'url' => ['/site/about']],
            ['label' => 'Contactanos', 'url' => ['/site/contact']],
        
            
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="col-md-4">
        Sociales
    </div>
    <div class="col-md-4">Ubicados</div>
    <div class="col-md-4">Enlaces</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
