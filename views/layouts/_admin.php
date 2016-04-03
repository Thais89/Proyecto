<?php use yii\bootstrap\Nav; ?>


<?php $this->beginContent("@app/views/layouts/main.php"); ?>
<div class="row">
	<div class="col-md-2">
		<?php echo Nav::widget([
    'items' => [
		'<li class="header">Menú Administrador</li>',
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
    ],
    'options' => ['class' =>'nav-pills nav-stacked'], // set this to nav-tab to get tab-styled navigation
]); ?>
	</div>
	<div class="col-md-10">
		<?php echo $content; ?>
	</div>
</div>

<?php $this->endContent(); ?>