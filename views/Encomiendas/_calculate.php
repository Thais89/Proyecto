<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\Encomiendas */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAsRecYNf0y5RXFMDBEELESnqOQd-vGJZk"></script>
<script type="text/javascript">
	            var map;
            var location1;
            var lat1;
            var long1;
            var location2;
            var lat2;
            var long2;

            var address1;
            var address2;

            var latlng;
            var geocoder;
            var map3;

            var distance;
            var precio_recorrido;
            var cantidad_documentos;
            var precio_documentos;
            var total;
            function initialize() {
              var myLatlng = new google.maps.LatLng(7.770076, -72.220130);

              var myOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              }
              map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
              map2 = new google.maps.Map(document.getElementById("map_canvas2"), myOptions); 

              var marker = new google.maps.Marker({
                draggable: true,
                position: myLatlng, 
                map: map,
                title: "Origen"
              });

              var marker2 = new google.maps.Marker({
                draggable: true,
                position: myLatlng, 
                map: map2,
                title: "Destino"
              });

              google.maps.event.addListener(marker, 'dragend', function (event) {
                document.getElementById("latbox").value = event.latLng.lat();
                document.getElementById("lngbox").value = event.latLng.lng();
              });

              google.maps.event.addListener(marker2, 'dragend', function (event) {
                document.getElementById("latbox2").value = event.latLng.lat();
                document.getElementById("lngbox2").value = event.latLng.lng();
              });

            }
            function calculate(){
    // center of the map (compute the mean value between the two locations)

    lat1 = document.getElementById("latbox").value;
    long1 = document.getElementById("lngbox").value;
    lat2 = document.getElementById("latbox2").value;
    long2 = document.getElementById("lngbox2").value;

    location1 = new google.maps.LatLng(lat1, long1);
    location2 = new google.maps.LatLng(lat2, long2);
    latlng = new google.maps.LatLng((location1.lat()+location2.lat())/2,(location1.lng()+location2.lng())/2);
    cantidad_documentos = parseInt(document.getElementById("documentos").value);
    
    if(lat1 != lat2 && long1 != long2 && cantidad_documentos > 0){
      // set map options
      // set zoom level
      // set center
      // map type
      var mapOptions = 
      {
        zoom: 14,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

    // create a new map object
      // set the div id where it will be shown
      // set the map options
      map3 = new google.maps.Map(document.getElementById("map_canvas3"), mapOptions);

    // show route between the points
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer(
    {
      suppressMarkers: true,
      suppressInfoWindows: true
    });
    directionsDisplay.setMap(map3);
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
        precio_recorrido = parseInt(parseFloat(response.routes[0].legs[0].distance.text) * 50);

        
        if (cantidad_documentos < 11) precio_documentos = 250;
        if (cantidad_documentos >= 11 && cantidad_documentos < 26) precio_documentos = 700;
        if (cantidad_documentos >= 26 && cantidad_documentos < 50) precio_documentos = 2000;
        total = precio_documentos + precio_recorrido;

        distance = "La distancia en ruta entre las dos locaciones es: "+response.routes[0].legs[0].distance.text;
        distance += "<br/>El tiempo aproximado de duración de la encomienda es: "+response.routes[0].legs[0].duration.text;
        distance += "<br/> El cargo por distancia recorrida es: "+ precio_recorrido +" Bs";
        distance += "<br/> El cargo por cantidad de documentos es: "+ precio_documentos +" Bs";
        distance += "<br/><br/> <h3>El costo TOTAL de la encomienda es: "+ total +" Bs</h3>";
        document.getElementById("distance_road").innerHTML = distance;
        
      }
    });
    
    // show a line between the two points
    var line = new google.maps.Polyline({
      map: map3, 
      path: [location1, location2],
      strokeWeight: 7,
      strokeOpacity: 0.8,
      strokeColor: "#FFAA00"
    });
    
    // create the markers for the two locations   
    var marker1 = new google.maps.Marker({
      map: map3, 
      position: location1,
      title: "Locación Origen"
    });
    var marker2 = new google.maps.Marker({
      map: map3, 
      position: location2,
      title: "Locación Destino"
    });
    
    // create the text to be shown in the infowindows
    var text1 = '<div id="content">'+
    '<h1 id="firstHeading">Locación Origen</h1>'+
    '<div id="bodyContent">'+
    '<p>Coordinates: '+location1+'</p>'+
    '<p>Address: '+address1+'</p>'+
    '</div>'+
    '</div>';

    var text2 = '<div id="content">'+
    '<h1 id="firstHeading">Locación Destino</h1>'+
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
      infowindow1.open(map3,marker1);
    });
    google.maps.event.addListener(marker2, 'click', function() {
      infowindow2.open(map3,marker1);
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
    var d = R * c;
    
    document.getElementById("distance_direct").innerHTML = "<br/>La distancia entre los dos puntos (en linea recta) es: "+d+"<br/> Punto de Origen: "+location1+"<br/> Punto de Destino: "+location2;
  }
}

function toRad(deg) 
{
  return deg * Math.PI/180;
}

</script> 
<div id="contenedor" onload="initialize()">
 <table align="center" width="810px" border="0" >
    <caption><center><h3>COTIZACION DE ENCOMIENDA</h3></center></caption>
    <tr>
      <td>
        <div id="map_canvas" style="width:400px; height:400px"></div>
      </td>

      <td>
        <div id="map_canvas2" style="width:400px; height:400px"></div>
      </td>
    </tr>

    <tr>
      <td>
        <div id="latlong">
          <p>Latitud Origen: &nbsp;&nbsp;&nbsp;<input size="20" type="text" id="latbox" name="lat" ></p>
          <p>Longitud Origen: <input size="20" type="text" id="lngbox" name="lng" ></p>
        </div>
      </td>

      <td>
        <div id="latlong2">
          <p>Latitud Destino: &nbsp;&nbsp;&nbsp;<input size="20" type="text" id="latbox2" name="lat" ></p>
          <p>Longitud Destino: <input size="20" type="text" id="lngbox2" name="lng" ></p>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="10" align="center">
      </br>
    </br>
    <p>Ingrese cantidad de sobres a enviar: &nbsp;&nbsp;&nbsp;<input type="number" id="documentos" min="1" max="50">
    </td>
  </tr>
  <tr>
    <td colspan="10" align="center">
    </br>
  </br>
  <input type="button" value="Cotizar" onclick="calculate();"/>
</td>
</tr>
<tr>
  <td colspan="10" align="center">
  </br>
  <center><div style="width:100%; height:10%" id="distance_direct"></div></center>
</br>
<center><div style="width:100%; height:10%" id="distance_road"></div></center>
<center><div style="width:100%; height:10%" id="distance_road"></div></center>
</br>
<center><div id="map_canvas3" style="width:800px; height:500px"></div></center>
</td>
</tr>
</table> 
</div>
</br>
<center><?= Html::a('Registrar Encomienda', ['register.php'], ['class' => 'btn btn-success']) ?></center>