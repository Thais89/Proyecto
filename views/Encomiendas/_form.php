<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\Encomiendas */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">

    var location1;
    var location2;
    
    var address1;
    var address2;

    var latlng;
    var geocoder;
    var map;
    
    var distance;
    
    
    
    // finds the coordinates for the two locations and calls the showMap() function
    function initialize()
    {
        geocoder = new google.maps.Geocoder(); // creating a new geocode object
        
        // getting the two address values
        address1 = document.getElementById("address1").value + "san cristobal tachira venezuela";
        address2 = document.getElementById("address2").value+ "san cristobal tachira venezuela";
        
        // finding out the coordinates
        if (geocoder) 
        {
            geocoder.geocode( { 'address': address1}, function(results, status) 
            {
                if (status == google.maps.GeocoderStatus.OK) 
                {
                    //location of first address (latitude + longitude)
                    location1 = results[0].geometry.location;
                } else 
                {
                    alert("La geolocalización no fue posible por la siguiente causa: : " + status);
                }
            });
            geocoder.geocode( { 'address': address2}, function(results, status) 
            {
                if (status == google.maps.GeocoderStatus.OK) 
                {
                    //location of second address (latitude + longitude)
                    location2 = results[0].geometry.location;
                    // calling the showMap() function to create and show the map 
                    showMap();
                } else 
                {
                    alert("La geolocalización no fue posible por la siguiente causa: " + status);
                }
            });
        }
    }
        
    // creates and shows the map
    function showMap()
    {
        // center of the map (compute the mean value between the two locations)
        latlng = new google.maps.LatLng((location1.lat()+location2.lat())/2,(location1.lng()+location2.lng())/2);
        
        // set map options
            // set zoom level
            // set center
            // map type
        var mapOptions = 
        {
            zoom: 1,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        
        // create a new map object
            // set the div id where it will be shown
            // set the map options
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        
        // show route between the points
        directionsService = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer(
        {
            suppressMarkers: true,
            suppressInfoWindows: true
        });
        directionsDisplay.setMap(map);
        var request = {
            origin:location1, 
            destination:location2,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) 
        {
            if (status == google.maps.DirectionsStatus.OK) 
            {
                directionsDisplay.setDirections(response);
                distance = "La distancia entre las dos ubicaciones es: "+response.routes[0].legs[0].distance.text;
                distance += "<br/>El tiempo estimado de la encomienda es: "+response.routes[0].legs[0].duration.text;
                document.getElementById("distance_road").innerHTML = distance;
            }
        });
        
        // show a line between the two points
        var line = new google.maps.Polyline({
            map: map, 
            path: [location1, location2],
            strokeWeight: 7,
            strokeOpacity: 0.8,
            strokeColor: "#FFAA00"
        });
        
        // create the markers for the two locations     
        var marker1 = new google.maps.Marker({
            map: map, 
            position: location1,
            color: blue,
            title: "Direccion Origen"
        });
        var marker2 = new google.maps.Marker({
            map: map, 
            position: location2,
            color: red,
            title: "Direccion Destino"
        });
        // create the text to be shown in the infowindows
        var text1 = '<div id="content">'+
                '<h1 id="firstHeading">Direccion Origen</h1>'+
                '<div id="bodyContent">'+
                '<p>Coordinates: '+location1+'</p>'+
                '<p>Address: '+address1+'</p>'+
                '</div>'+
                '</div>';
                
        var text2 = '<div id="content">'+
            '<h1 id="firstHeading">Direccion Destino</h1>'+
            '<div id="bodyContent">'+
            '<p>Coordinates: '+location2+'</p>'+
            '<p>Address: '+address2+'</p>'+
            '</div>'+
            '</div>';
        
        // create info boxes for the two markers
        var infowindow1 = new google.maps.InfoWindow({
            content: text1
        });
        var infowindow2 = new google.maps.InfoWindow({
            content: text2
        });

        // add action events so the info windows will be shown when the marker is clicked
        google.maps.event.addListener(marker1, 'click', function() {
            infowindow1.open(map,marker1);
        });
        google.maps.event.addListener(marker2, 'click', function() {
            infowindow2.open(map,marker1);
        });
        
        // compute distance between the two points
        var R = 6371; 
        var dLat = toRad(location2.lat()-location1.lat());
        var dLon = toRad(location2.lng()-location1.lng()); 
        
        var dLat1 = toRad(location1.lat());
        var dLat2 = toRad(location2.lat());
        
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(dLat1) * Math.cos(dLat1) * 
                Math.sin(dLon/2) * Math.sin(dLon/2); 
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = (R * c)/1000;
        
        document.getElementById("distance_direct").innerHTML = "<br/>La distancia entre las dos ubicaciones (en linea recta) es: "+d+" km";
        document.getElementById("charge").innerHTML = "<br/>El monto a cobrar por la encomienda es: "+d*100+"  BsF";
    }
    
    function toRad(deg) 
    {
        return deg * Math.PI/180;
    }
</script>

<div id="form" style="width:100%; height:20%">
        <table align="center" valign="center">
            <tr>
                <td colspan="7" align="center"><b>Ingrese ubicaciones para calcular la encomienda</b></td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td>Dirección Origen:</td>
                <td>&nbsp;</td>
                <td><input type="text" name="address1" id="address1" size="50"/></td>
                <td>&nbsp;</td>
                <td>Dirección Destino:</td>
                <td>&nbsp;</td>
                <td><input type="text" name="address2" id="address2" size="50"/></td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7" align="center"><input type="button" value="Calcular Distancia" onclick="initialize();"/></td>
            </tr>
        </table>
    </div>
    <center><div style="width:100%; height:10%" id="distance_direct"></div></center>
    <center><div style="width:100%; height:10%" id="distance_road"></div></center>
    <center><div style="width:100%; height:10%" id="charge"></div></center>     
    <center><div id="map_canvas" style="width:70%; height:54%"></div></center>

<div class="encomiendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'latitudOrigen')->textInput() ?>

    <?= $form->field($model, 'longitudOrigen')->textInput() ?>

    <?= $form->field($model, 'latitudDestino')->textInput() ?>

    <?= $form->field($model, 'longitudDestino')->textInput() ?>

    <?= $form->field($model, 'distancia')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'cantIDadDocumentos')->textInput() ?>

    <?= $form->field($model, 'receptorNombre')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'receptorCedula')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    
    <?= $form->field($model, 'fechaSolicitud')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
]);?>

    
    <?= $form->field($model, 'fechaRecepcion')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
]);?>


    
        <?= $form->field($model, 'fechaEntrega')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
]);?>


    
<?=
    $form->field($model, 'usuarioID')->textInput(['maxlength' => 100])

    //use app\models\Country;
/*$usuarios=Usuarios::find()->all();

//use yii\helpers\ArrayHelper;
$listData=ArrayHelper::map($usuarios,'usuarioID','cedula');

echo $form->field($model, 'cedula')->dropDownList(
                                $listData, 
                                ['prompt'=>'Select...']);*/

    ?>


    <?= $form->field($model, 'estadoEncomiendaID')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
