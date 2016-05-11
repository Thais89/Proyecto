<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use app\models\Usuarios;
use app\models\Encomiendas;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EncomiendasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignar Repartidor';

$model = new Usuarios();
$model1 = new Encomiendas();



//
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomiendas-index">
	
	<div>
    	<div>
    		<h1><?= Html::encode($this->title) ?></h1>
    	</div>
    	<div>
    		<div class="form-group">
            	<?php $form = ActiveForm::begin([
            		'id' => 'login-form',
            		'options' => ['class' => 'form-horizontal'],
            		'fieldConfig' => [
                	'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
                	'labelOptions' => ['class' => 'col-lg-4 control-label'],
            		],
        		]); ?>
        
       			<?= $form->field($model, 'usuarioID')->dropDownList($A_usuarios) ?> 
       			<?= $form->field($model1, 'encomiendaID')->dropDownList($A_encomienda) ?> 
				
				<?= Html::submitButton('Asignar',['class' => 'btn btn-primary']) ?>
        		
				<button class='btn btn-primary' onclick="myFunction()">Click me</button>
            	
        	</div>
    	</div>
    </div>

    <div>
	 	
	 	<?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'filterModel' => $searchModel,
	        'layout' => '{items}',
	        'columns' => [
	            ['class' => 'yii\grid\CheckboxColumn'],
	            //['class' => 'yii\grid\SerialColumn'],
				'encomiendaID',
	            'direccionOrigen',
	            'direccionDestino',
	            'distancia',
	            'tiempoEstimado',
	            // 'receptorNombre',
	            // 'receptorCedula',
	            // 'precio',
	            // 'fechaSolicitud',
	            // 'fechaRecepcion',
	            // 'fechaEntrega',
	            // 'usuarioID',
	            // 'estadoEncomiendaID',
	            // 'tabuladorID',

	            //['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	    
	    <?php ActiveForm::end(); ?> 
    </div>
</div>




<head>
    <script type="text/javascript">

	function myFunction() {
		var keys = $('#grid').yiiGridView('getSelectedRows');
		console.log(keys);
		$.post({
   		url: '/encomiendas/grid', // your controller action
   		dataType: 'json',
   		data: {keylist: keys},
   		success: function(data) {
      		alert('I did it! Processed checked rows.')
   		},
		});
		alert('End')
	}

    </script>
</head>
