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

<div class="container-fluid">
    <div class="row top-bar text-right">
        <ul >
            <li> <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a> </li>
            
            <li> <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a> </li>
            <li> <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a> </li>            
        </ul>
    </div>
</div>

<header class="container-fluid main-header">
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4"> 
            <?= Html::a(Html::img("img/logo.png",["class"=>"logo"]),["/site/index"])  ?> </div>
        <div class="col-sm-12 col-md-8 text-right">  
            <div class="row">
                <div class="col-sm-12 header-login">
                    <?php  echo   Yii::$app->user->isGuest ? (
                Html::a("Iniciar Sesión",["/site/login"], ['class'=>'btn btn-primary']).
                "<br>¿No tienes cuenta? ".Html::a("Registrate",["/site/create"])
            ) : (
                 Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Cerrar Sesión (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
               
            ); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row main-nav">
        <?php
    NavBar::begin([
        
    ]);
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-default'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Servicios', 'url' => ['/site/servicios']],
            ['label' => 'Acerca de nosotros', 'url' => ['/site/about']],
            ['label' => 'Como enviar', 'url' => ['/site/como-enviar']],
            ['label' => 'Contactanos', 'url' => ['/site/contact']],
        ],
    ]);
    NavBar::end();
    ?>
    </div>
</header>

<div class="container">
<div class="row">
    <div class="col-sm-12">
    <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
</div>
</div>

<?= $content ?>

<footer class="main-footer">
<div class="container">
<div class="row">
            
    <div class="col-sm-12 col-md-4 social-networks">
        <h3>Redes Sociales</h3> 
        <ul >
            <li> <a href="#"><i class="fa fa-facebook-square fa-2x"></i> Facebook</a> </li>
            <li> <a href="#"><i class="fa fa-twitter-square fa-2x"></i> Twitter</a> </li>
            <li> <a href="#"><i class="fa fa-google-plus-square fa-2x"></i> Google Plus</a> </li>
        </ul>
    </div>
    <div class="col-sm-12 col-md-4">
        <h3>Nuestra ubicaci&oacute;n</h3>
        <div id="footer-map"></div>
    </div>
    <div class="col-sm-12 col-md-4">
        <h3>Enlaces</h3>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Servcios</a></li>
            <li><a href="#">Acerca de nosotros</a></li>
            <li><a href="#">&iquest;Como enviar?</a></li>
            <li><a href="#">Cont&aacute;ctanos</a></li>
        </ul>
    </div>
</div>
</div>
</footer>

<?php $this->endBody() ?>
<script>
    function initMap() {
        var mapDiv = document.getElementById('footer-map');
        var map = new google.maps.Map(mapDiv, {
          center: {lat: 44.540, lng: -78.546},
          zoom: 8
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>

</body>
</html>
<?php $this->endPage() ?>
