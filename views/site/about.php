<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Acerca de nosotros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about container">
<div class="row">
	<div class="col-sm-12 col-md-12">
	    <h1><?= Html::encode($this->title) ?></h1>
	
	    <p>
        	DeliverySC es un sitio web que se especializa en el servicio de envío de encomiendas, especificamente documentos en la ciudad de San Cristóbal estado Táchira
    	</p>

	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-4">
		<h2>Misión</h2>
		<div class="well well-lg">
			Va dirigido al público en general, específicamente a aquellas personas que no dispongan del tiempo necesario para realizar sus envíos y diligencias en general por causa de su trabajo y otras ocupaciones, simplificándoles la gestión de sus responsabilidades.
		</div>
	</div>
	<div class="col-sm-12 col-md-4">
		<h2>Visión</h2>
		<div class="well well-lg">
			DeliverySC funcionará de manera autónoma vía web ofreciendo una accesible y simple alternativa para la gestión de encomiendas a través de un servicio de envíos.			
		</div>
	</div>
	<div class="col-sm-12 col-md-4">
		<h2>Valores</h2>
		<div class="well well-lg">
			<ul>
				<li>Eficacia</li>
				<li>Eficiencia</li>
				<li>Seguridad</li>
				<li>Rapidez</li>
			</ul>
		</div>
	</div>
</div>
</div>
