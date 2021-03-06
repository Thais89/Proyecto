<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Index';
?>

<!-- Carousel -->
<div class="container-full">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="<?= Yii::$app->request->baseUrl . '/img/carousel/1.jpg';?>" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>DeliverySC al alcance</h1>
              <p>DeliverySC pone sus servicios a tu alcance</p>
              <p><?= Html::a('Servicios', 'servicios',['class'=>'btn btn-primary btn-lg']); ?></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="<?= Yii::$app->request->baseUrl . '/img/carousel/2.jpg';?>" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Entrega todos los documentos urgentes con DeliverySC</h1>
              <p>Entrega tus documentos en tiempo record</p>              
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="<?= Yii::$app->request->baseUrl . '/img/carousel/3.jpg';?>" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>&iquest;Tienes dudas sobre DeliverySC?</h1>
              <p>Contactanos y resuelve tus dudas</p>
              <p><?= Html::a('Contactanos', 'contact',['class'=>'btn btn-primary btn-lg']); ?></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div>
<!-- End Carousel -->
<div class="container">
<div class="row">
   <h2 class="text-center">&iquest;Como enviar?</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-3">
      <h3>Paso 1:</h3>
      <p class="well well-lg">
        Registrate en nuestro sitio e inicia sesión
      </p>
    </div>
    <div class="col-sm-12 col-md-3">
      <h3>Paso 2:</h3>
      <p class="well well-lg">
        Indica la ubicación a donde irá el envío junto con 
        la fecha en que quieres que se realice
      </p>
    </div>
    <div class="col-sm-12 col-md-3">
      <h3>Paso 3:</h3>
      <p class="well well-lg">
        Indica el detalle de la encomienda
      </p>
    </div>
    <div class="col-sm-12 col-md-3">
      <h3>Paso 4:</h3>
      <p class="well well-lg">
        Realiza tu pago y confirma los datos de envío
      </p>
    </div>
  </div>
</div>
