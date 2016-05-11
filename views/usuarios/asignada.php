<?php 
	use yii\helpers\Html;
	use yii\grid\GridView;
	
?>
<div class="container">
<div class="row">
    <h2>Mis encomiendas</h2>
</div>
<div class="row">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
        	['class' => 'yii\grid\SerialColumn'],
			//'encomiendaID' ,         
            'direccionOrigen',       
            'direccionDestino',      
            //'distancia',    
            'tiempoEstimado',    
            'receptorNombre',   
            'receptorCedula', 
            //'precio',
            //'fechaSolicitud' ,
            //'fechaRecepcion',
            'fechaEntrega',
            //'usuarioID',
            //'estadoEncomiendaID',
            //'tabuladorID',

        ],
    ]); ?>
</div>
</div>