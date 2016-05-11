<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EncomiendasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignar Repartidor';
$model = new Usuarios();

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
        
       			<?= $form->field($model, 'usuarioID')->textInput(['maxlength' => true]) ?> 

            	<?= Html::submitButton('Asignar',['class' => 'btn btn-primary']) ?>
        	</div>
    	</div>
    </div>

    <div>
	 	<?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'filterModel' => $searchModel,
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
