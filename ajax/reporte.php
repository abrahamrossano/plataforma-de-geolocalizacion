<?php //require_once("inc/init.php"); 
require_once("../libreria/sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: ../login.php");
        
	}
	else 
	{
        include_once('../libreria/database.php');
        include_once('../libreria/config.php');
        include_once('../libreria/consulta.php');
        $id = $sesion->get("id");
        $sql= new database(HOST, USER, PASSWD, DATABASE);
        $con= new consulta($sql);
        
        $diaU = $_POST["dia"];
        $iniU = $_POST["inicio"];
        $finU = $_POST["fin"];
        $idU = $_POST["id_unidad"];
        
        if(!empty($_POST)){
            if(isset($_POST["dia"]) &&isset($_POST["inicio"]) &&isset($_POST["fin"]) &&isset($_POST["id_unidad"])){
                if($_POST["dia"]!=""&& $_POST["inicio"]!=""&&$_POST["fin"]!=""&&$_POST["id_unidad"]!=""){
                    
                    $uni = $con->getInfoMapa($id,$idU);

                    $sesion->set("dia",$diaU);
                    $sesion->set("ini",$iniU);
                    $sesion->set("fin",$finU);
                    $sesion->set("idU",$idU);                 
                    
                } else{print "<script>alert(\"Problema en el registro nivel 3\");window.close();</script>";}
            } else{print "<script>alert(\"Problema en el registro nivel 2\");window.close();</script>";}
        } else { print "<script>alert(\"Problema en el registro nivel 1\");windowclose();</script>";}
        
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Reporte</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD24LWCs86pgXqdvWiugdnx3ZTOxsOSEsI&libraries=drawing"></script>
    <style type="text/css">
        #map,
        html,
        body {
            padding: 0;
            margin: 0;
            width: 850px;
            height: 490px;
        }

        .map-control {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
            font-family: 'Roboto', 'sans-serif';
            margin: 10px;
            /* Hide the control initially, to prevent it from appearing
           before the map loads. */
            display: none;
        }
        /* Display the control once it is inside the map. */
        
        #map .map-control {
            display: block;
        }
        
        #style-selector {
            font-size: 14px;
            line-height: 30px;
            padding-left: 5px;
            padding-right: 5px;
        }

    </style>
    <script type="text/javascript">
        var infoWindow;
        function initialize() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: new google.maps.LatLng(19.076577, -98.302119),
                disableDefaultUI: true,
                zoomControl: true
            });

            // Add a style-selector control to the map.
            var styleControl = document.getElementById('style-selector-control');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(styleControl);

            // Set the map's style to the initial value of the selector.
            var styleSelector = document.getElementById('style-selector');
            map.setOptions({
                styles: styles[styleSelector.value]
            });

            // Apply new JSON when the user selects a different style.
            styleSelector.addEventListener('change', function() {
                map.setOptions({
                    styles: styles[styleSelector.value]
                });
            });
            
            infoWindow = new google.maps.InfoWindow();
            
            downloadUrl('inicio.php', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                    var name = markerElem.getAttribute('name');
                    var address = markerElem.getAttribute('address');
                    var type = markerElem.getAttribute('type');
                    var point = new google.maps.LatLng(
                        parseFloat(markerElem.getAttribute('lat')),
                        parseFloat(markerElem.getAttribute('lng')));

                    var infowincontent = document.createElement('div');
                    var strong = document.createElement('strong');
                    strong.textContent = name
                    infowincontent.appendChild(strong);
                    infowincontent.appendChild(document.createElement('br'));

                    var text = document.createElement('text');
                    text.textContent = address
                    infowincontent.appendChild(text);
                    //var icon = customLabel[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        //,label: icon.label
                    });
                    marker.addListener('click', function() {
                        infoWindow.setContent(infowincontent);
                        infoWindow.open(map, marker);
                        if (marker.getAnimation() !== null) {
                            marker.setAnimation(null);
                        } else {
                            marker.setAnimation(google.maps.Animation.BOUNCE);
                        }
                    });
                });
            });
            
            downloadUrl('geofences.php', function(data) {
                    var xml = data.responseXML;
                    var rectangle = xml.documentElement.getElementsByTagName('rectangle');
                    Array.prototype.forEach.call(rectangle, function(markerElem2) {
                    var north = parseFloat(markerElem2.getAttribute('north'));
                    var south = parseFloat(markerElem2.getAttribute('south'));
                    var east = parseFloat(markerElem2.getAttribute('east'));
                    var west = parseFloat(markerElem2.getAttribute('west'));
                        var bounds = {
                        north: north,
                        south: south,
                        east: east,
                        west: west
                    };
                      
                      
                      
                      var rectangle2 = new google.maps.Rectangle({
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#FF0000',
                        fillOpacity: 0.35,
                        editable: false,
                        draggable: false,
                        map: map,
                        bounds: bounds
                    });
                              
                    });
                  });

            var trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);

        }



        var styles = {
            default: [{
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }
            ],

            silver: [{
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ebe3cd"
                    }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#523735"
                    }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#f5f1e6"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#c9b2a6"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#dcd2be"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#ae9e90"
                    }]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dfd2ae"
                    }]
                },
                {
                    "featureType": "poi",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dfd2ae"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#93817c"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#a5b076"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#447530"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f5f1e6"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#fdfcf8"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f8c967"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#e9bc62"
                    }]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e98d58"
                    }]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#db8555"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#806b63"
                    }]
                },
                {
                    "featureType": "transit",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dfd2ae"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#8f7d77"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#ebe3cd"
                    }]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dfd2ae"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#b9d3c2"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#92998d"
                    }]
                }
            ],

            night: [{
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#1d2c4d"
                    }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#8ec3b9"
                    }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#1a3646"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#4b6878"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#64779e"
                    }]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#4b6878"
                    }]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#334e87"
                    }]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#023e58"
                    }]
                },
                {
                    "featureType": "poi",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#283d6a"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#6f9ba5"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#1d2c4d"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#023e58"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#3C7680"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#304a7d"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#98a5be"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#1d2c4d"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#2c6675"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#255763"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#b0d5ce"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#023e58"
                    }]
                },
                {
                    "featureType": "transit",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#98a5be"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#1d2c4d"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#283d6a"
                    }]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#3a4762"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#0e1626"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#4e6d70"
                    }]
                }
            ]
        };


        google.maps.event.addDomListener(window, 'load', initialize);

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }

        function doNothing() {}

    </script>
</head>

<body>
    <div id="style-selector-control" class="map-control">
        <select id="style-selector" class="form-control">
            <option value="default" selected="selected" class="form-control">Por defecto</option>
            <option value="silver" class="form-control">Crema</option>
            <option value="night" class="form-control">Noche</option>
      </select>
    </div>
    <div id="map" name="map"></div>
    <div id="datos" name="datos">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Licencia</th>
                    <th>Unidad</th>
                    <th>Placa</th>
                    <th>Dia</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($uni as $fila){ ?>
                <tr>
                    <td>
                        <?=$fila["nombre_chofer"]?>
                            <?=$fila["ape_p"]?>
                                <?=$fila["ape_m"]?>
                    </td>
                    <td>
                        <img src="../img/avatars/<?=$fila["foto_chofer"]?>" class="img-thumbnail"/>
                    </td>
                    <td>
                        <?=$fila["num_licencia"]?>
                    </td>
                    <td>
                        <?=$fila["num_unidad"]?>
                    </td>
                    <td>
                        <?=$fila["placa_unidad"]?>
                    </td>
                    <td>
                        <?php echo $diaU; ?>
                    </td>
                    <td>
                        <?php echo $iniU; ?>
                    </td>
                    <td>
                        <?php echo $finU; ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php } ?>
