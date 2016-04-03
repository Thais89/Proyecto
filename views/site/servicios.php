<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Servicios';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-8">
			<h2>Envío de Documentos</h2>
			<p>
				Prestamos servicios de envíos de envíos regionales especificamente en la ciudad de San Cristóbal estado Táchira, especializandonos en el envío de documentos en toda esta zona.

				<ul>
					<li>Sin peso minimo requerido <span class="label label-primary">Nuevo</span></li>
					<li>Tiempo estimado de entrega de 1 a 2 dias hábiles</li>
					<li>Tarifas competitivas</li>
					<li>Entregas a domicilio</li>
				</ul>
			</p>
		</div>
		<div class="col-sm-12 col-md-4">
			<img src="<?= Yii::$app->request->baseUrl . '/img/delivery.jpg';?>" alt="DeliverySC" class="img-responsive">
		</div>
	</div>
	
	<div class="row"><hr></div>

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<h2>Planes a futuro</h2>
			<p>
				Próximamente contaremos con el servicio de envíos regionales a otros municipios y ciudades del estado Táchira, llevando su encomienda a su destino en el menor tiempo posible.
			</p>
		</div>
	</div>
</div>