
<!DOCTYPE html>
<html lang="es-MX" <?php echo implode(' ', array_map(function($prop, $value) {
			return $prop.'="'.$value.'"';
		}, array_keys($page_html_prop), $page_html_prop)) ;?>>
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> <?php echo $page_title != "" ? $page_title." - " : ""; ?>Empresa </title>
		<meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support is under construction-->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-rtl.min.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/your_style.css"> -->

		<?php

			if ($page_css) {
				foreach ($page_css as $css) {
					echo '<link rel="stylesheet" type="text/css" media="screen" href="'.ASSETS_URL.'/css/'.$css.'">';
				}
			}
		?>


		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo ASSETS_URL; ?>/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo ASSETS_URL; ?>/img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?php echo ASSETS_URL; ?>/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo ASSETS_URL; ?>/img/splash/touch-icon-ipad-retina.png">

		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?php echo ASSETS_URL; ?>/img/splash/iphone.png" media="screen and (max-device-width: 320px)">
        
        <script type="text/javascript">
            var URLactual = window.location;
            
            if(URLactual=='http://localhost:8080/24_de_agosto/empresa/#ajax/geocercas.php'){
               
               }else{
                   
               }
        </script>
        
		<!-- <link rel="stylesheet" href="ajax/themes/alertify.core.css" />
    <link rel="stylesheet" href="ajax/themes/alertify.default.css" id="toggleCSS" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD24LWCs86pgXqdvWiugdnx3ZTOxsOSEsI&libraries=drawing&libraries=places,drawing"></script>
    <style type="text/css">
        
        #panel {
            width: 200px;
            font-family: Arial, sans-serif;
            font-size: 13px;
            float: right;
            margin: 10px;
        }
        
        #color-palette {
            clear: both;
        }
        
        .color-button {
            width: 14px;
            height: 14px;
            font-size: 0;
            margin: 2px;
            float: left;
            cursor: pointer;
        }
        
        #delete-button {
            margin-top: 5px;
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
        
        .selector-control {
            font-size: 14px;
            line-height: 30px;
            padding-left: 5px;
            padding-right: 5px;
        }
        
        .selector-control2 {
            font-size: 14px;
            line-height: 30px;
            padding-left: 5px;
            padding-right: 5px;
        }

    </style>
    <style>
        .alertify-log-custom {
            background: blue;
        }

    </style>
    <script type="text/javascript">
        var drawingManager;
        var selectedShape;
        var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
        var selectedColor;
        var colorButtons = {};
        var infoWindow;

        infoWindow = new google.maps.InfoWindow();

        function clearSelection() {
            if (selectedShape) {
                if (typeof selectedShape.setEditable == 'function') {
                    selectedShape.setEditable(false);
                }
                selectedShape = null;
            }
            curseldiv.innerHTML = "<b>cursel</b>:";
        }

        function updateCurSelText(shape) {
            posstr = "" + selectedShape.position;
            if (typeof selectedShape.position == 'object') {
                posstr = selectedShape.position.toUrlValue();
            }
            pathstr = "" + selectedShape.getPath;
            if (typeof selectedShape.getPath == 'function') {
                pathstr = "[ ";
                for (var i = 0; i < selectedShape.getPath().getLength(); i++) {
                    // .toUrlValue(5) limits number of decimals, default is 6 but can do more
                    pathstr += selectedShape.getPath().getAt(i).toUrlValue() + " , ";
                }
                pathstr += "]";
            }
            bndstr = "" + selectedShape.getBounds;
            cntstr = "" + selectedShape.getBounds;
            if (typeof selectedShape.getBounds == 'function') {
                var tmpbounds = selectedShape.getBounds();
                cntstr = "" + tmpbounds.getCenter().toUrlValue();
                bndstr = "[NE: " + tmpbounds.getNorthEast().toUrlValue() + " SW: " + tmpbounds.getSouthWest().toUrlValue() + "]";
            }
            cntrstr = "" + selectedShape.getCenter;
            if (typeof selectedShape.getCenter == 'function') {
                cntrstr = "" + selectedShape.getCenter().toUrlValue();
            }
            radstr = "" + selectedShape.getRadius;
            if (typeof selectedShape.getRadius == 'function') {
                radstr = "" + selectedShape.getRadius();
            }
            curseldiv.innerHTML = "<b>cursel</b>: " + selectedShape.type + selectedShape.fillColor + " " + selectedShape + "; <i>pos</i>: " + posstr + " ; <i>path</i>: " + pathstr + " ; <i>bounds</i>: " + bndstr + " ; <i>Cb</i>: " + cntstr + " ; <i>radius</i>: " + radstr + " ; <i>Cr</i>: " + cntrstr;
        }

        function setSelection(shape, isNotMarker) {
            clearSelection();
            selectedShape = shape;
            if (isNotMarker)
                shape.setEditable(true);
            selectColor(shape.get('fillColor') || shape.get('strokeColor'));
            updateCurSelText(shape);
        }

        function deleteSelectedShape() {
            if (selectedShape) {
                selectedShape.setMap(null);
            }
        }

        function selectColor(color) {
            selectedColor = color;
            for (var i = 0; i < colors.length; ++i) {
                var currColor = colors[i];
                colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
            }
            // Retrieves the current options from the drawing manager and replaces the
            // stroke or fill color as appropriate.
            var polylineOptions = drawingManager.get('polylineOptions');
            polylineOptions.strokeColor = color;
            drawingManager.set('polylineOptions', polylineOptions);
            var rectangleOptions = drawingManager.get('rectangleOptions');
            rectangleOptions.fillColor = color;
            drawingManager.set('rectangleOptions', rectangleOptions);
            var circleOptions = drawingManager.get('circleOptions');
            circleOptions.fillColor = color;
            drawingManager.set('circleOptions', circleOptions);
            var polygonOptions = drawingManager.get('polygonOptions');
            polygonOptions.fillColor = color;
            drawingManager.set('polygonOptions', polygonOptions);
        }

        function setSelectedShapeColor(color) {
            if (selectedShape) {
                if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
                    selectedShape.set('strokeColor', color);
                } else {
                    selectedShape.set('fillColor', color);
                }
            }
        }

        function makeColorButton(color) {
            var button = document.createElement('span');
            button.className = 'color-button';
            button.style.backgroundColor = color;
            google.maps.event.addDomListener(button, 'click', function() {
                selectColor(color);
                setSelectedShapeColor(color);
            });
            return button;
        }

        function buildColorPalette() {
            var colorPalette = document.getElementById('color-palette');
            for (var i = 0; i < colors.length; ++i) {
                var currColor = colors[i];
                var colorButton = makeColorButton(currColor);
                colorPalette.appendChild(colorButton);
                colorButtons[currColor] = colorButton;
            }
            selectColor(colors[0]);
        }
        /////////////////////////////////////
        var map; //= new google.maps.Map(document.getElementById('map'), {
        // these must have global refs too!:

        var curposdiv;
        var curseldiv;

        /////////////////////////////////////
        function initialize() {
            map = new google.maps.Map(document.getElementById('map'), { //var
                zoom: 16, //10,
                center: new google.maps.LatLng(19.057117, -98.26911), //(22.344, 114.048),
                disableDefaultUI: true,
                zoomControl: true
            });
            curposdiv = document.getElementById('curpos');
            curseldiv = document.getElementById('cursel');

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

            var polyOptions = {
                strokeWeight: 0,
                fillOpacity: 0.45,
                editable: true,
                draggable: true
            };
            // Creates a drawing manager attached to the map that allows the user to draw
            // markers, lines, and shapes.
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                markerOptions: {
                    draggable: true
                },
                polylineOptions: {
                    editable: true,
                    draggable: true
                },
                rectangleOptions: polyOptions,
                circleOptions: polyOptions,
                polygonOptions: polyOptions,
                map: map
            });
            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
                //~ if (e.type != google.maps.drawing.OverlayType.MARKER) {
                var isNotMarker = (e.type != google.maps.drawing.OverlayType.MARKER);
                // Switch back to non-drawing mode after drawing a shape.
                drawingManager.setDrawingMode(null);
                // Add an event listener that selects the newly-drawn shape when the user
                // mouses down on it.
                var newShape = e.overlay;
                newShape.type = e.type;
                google.maps.event.addListener(newShape, 'click', function() {
                    setSelection(newShape, isNotMarker);
                });
                google.maps.event.addListener(newShape, 'drag', function() {
                    updateCurSelText(newShape);
                });

                google.maps.event.addListener(newShape, 'bounds_changed', function() {
                    updateCurSelText(newShape);
                });
                google.maps.event.addListener(newShape, 'dragend', function() {
                    updateCurSelText(newShape);
                });
                setSelection(newShape, isNotMarker);
                //~ }// end if
            });
            // Clear the current selection when the drawing mode is changed, or when the
            // map is clicked.
            google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
            google.maps.event.addListener(map, 'click', clearSelection);
            google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
            buildColorPalette();
            //~ initSearch();

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

            var trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);

            // Bias the SearchBox results towards places that are within the bounds of the
            // current map's viewport.
            google.maps.event.addListener(map, 'bounds_changed', function() {
                var bounds = map.getBounds();
                //searchBox.setBounds(bounds);
                curposdiv.innerHTML = "<b>curpos</b> Z: " + map.getZoom() + " C: " + map.getCenter().toUrlValue();
            });


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

        function saveData() {

            var name = document.getElementById("nombre").value;
            var cadena = selectedShape.fillColor,
                inicio = 1,
                fin = 7,
                subCadena = cadena.substring(inicio, fin);
            var address = subCadena;
            //alert(subCadena);

            var tmpbounds = selectedShape.getBounds();
            var NorthEast = tmpbounds.getNorthEast().toUrlValue();
            var SouthWest = tmpbounds.getSouthWest().toUrlValue();

            var url = "phpsqlinfo_addrow.php?name=" + name + "&address=" + address +
                "&type=" + NorthEast + "&lat=" + SouthWest;
            downloadUrl2(url, function(data, responseCode) {
                if (responseCode == 200 && data.length <= 1) {
                    reset();
                    alertify.success("Guardado");
                    return false;
                } else {
                    reset();
                    alertify.error("Error");
                    return false;
                }
            });
        }

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

        function downloadUrl2(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request.responseText, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }

        function doNothing() {}

        // To hide:
        function mostrar() {
            drawingManager.setOptions({
                drawingControl: true
            });
            document.getElementById('panel').style.display = 'block';
        }

        // To show:
        function ocultar() {
            drawingManager.setOptions({
                drawingControl: false
            });
            document.getElementById('panel').style.display = 'none';
        }

    </script>-->
		
	</head>
	<body <?php echo implode(' ', array_map(function($prop, $value) {
			return $prop.'="'.$value.'"';
		}, array_keys($page_body_prop), $page_body_prop)) ;?>>
		<!-- POSSIBLE CLASSES: minified, fixed-ribbon, fixed-header, fixed-width
			 You can also add different skin classes such as "smart-skin-1", "smart-skin-2" etc...-->
		<?php
			if (!$no_main_header) {

		?>
				<!-- HEADER -->
				<header id="header">
					<div id="logo-group">

						<!-- PLACE YOUR LOGO HERE -->
						<span id="logo"> <!--<img src="<?php echo ASSETS_URL; ?>/img/logo.png" alt="SmartAdmin"> -->Logo</span>
						<!-- END LOGO PLACEHOLDER -->

						<!-- Note: The activity badge color changes when clicked and resets the number to 0
						Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
						<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 3 </b> </span>

						<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
						<div class="ajax-dropdown">

							<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
							<div class="btn-group btn-group-justified" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="activity" id="<?php echo APP_URL; ?>/ajax/notify/notifications.php">
									notificaciones (3) </label>
							</div>

							<!-- notification content -->
							<div class="ajax-notifications custom-scroll">

								<div class="alert alert-transparent">
									<h4>Click a button to show messages here</h4>
									This blank page message helps protect your privacy, or you can show the first message here automatically.
								</div>

								<i class="fa fa-lock fa-4x fa-border"></i>

							</div>
							<!-- end notification content -->

							<!-- footer: refresh area -->
							<span> Última actualización: 12/12/2013 9:43AM
								<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
									<i class="fa fa-refresh"></i>
								</button> </span>
							<!-- end footer -->

						</div>
						<!-- END AJAX-DROPDOWN -->
					</div>

					<!-- projects dropdown -->
					<!--<div class="project-context hidden-xs">

						<span class="label">Projects:</span>
						<span id="project-selector" class="popover-trigger-element dropdown-toggle" data-toggle="dropdown">Recent projects <i class="fa fa-angle-down"></i></span>

						<!-- Suggestion: populate this list with fetch and push technique -->
						<!--<ul class="dropdown-menu">
							<li>
								<a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
							</li>
							<li>
								<a href="javascript:void(0);">Notes on pipeline upgradee</a>
							</li>
							<li>
								<a href="javascript:void(0);">Assesment Report for merchant account</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
							</li>
						</ul>
						<!-- end dropdown-menu-->

					<!--</div>
					<!-- end projects dropdown -->

					<!-- pulled right: nav area -->
					<div class="pull-right">

						<!-- collapse menu button -->
						<div id="hide-menu" class="btn-header pull-right">
							<span> <a href="javascript:void(0);" title="Minimizar menu" data-action="toggleMenu"><i class="fa fa-reorder"></i></a> </span>
						</div>
						<!-- end collapse menu -->

						<!-- #MOBILE -->
						<!-- Top menu profile link : this shows only when top menu is active -->
						<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
							<li class="">
								<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
									<img src="<?php echo ASSETS_URL; ?>/img/avatars/sunny.png" alt="John Doe" class="online" />
								</a>
								<ul class="dropdown-menu pull-right">
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Configuración</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="#ajax/profile.php" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>erfil</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Pantalla <u>C</u>ompleta</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="login.php" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>S</u>alir</strong></a>
									</li>
								</ul>
							</li>
						</ul>

						<!-- logout button -->
						<div id="logout" class="btn-header transparent pull-right">
							<span> <a href="<?php echo APP_URL; ?>/login.php" title="Salir" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
						</div>
						<!-- end logout button -->

						<!-- search mobile button (this is hidden till mobile view port) -->
						<div id="search-mobile" class="btn-header transparent pull-right">
							<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
						</div>
						<!-- end search mobile button -->

						<!-- input: search field -->
						<form action="#ajax/search.php" class="header-search pull-right">
							<input type="text" name="param" placeholder="Buscar..." id="search-fld">
							<button type="submit">
								<i class="fa fa-search"></i>
							</button>
							<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
						</form>
						<!-- end input: search field -->

						<!-- fullscreen button -->
						<div id="fullscreen" class="btn-header transparent pull-right">
							<span> <a href="javascript:void(0);" title="Pantalla completa" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i></a> </span>
						</div>
						<!-- end fullscreen button -->

						<!-- #Voice Command: Start Speech -->
						<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
							<div> 
								<a href="javascript:void(0)" title="Comando de Voz" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
								<div class="popover bottom"><div class="arrow"></div>
									<div class="popover-content">
										<h4 class="vc-title">Comando de voz activado <br><small>Hable claro en el microfono</small></h4>
										<h4 class="vc-title-error text-center">
											<i class="fa fa-microphone-slash"></i> Voice command failed
											<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
											<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
										</h4>
										<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">Ver opciones</a> 
										<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Cerrar mensaje</a> 
									</div>
								</div>
							</div>
						</div>
						<!-- end voice command -->

						<!-- multiple lang dropdown : find all flags in the flags page -->
											
						<ul class="header-dropdown-list hidden-xs">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
									<img src="<?php echo ASSETS_URL; ?>/img/blank.gif" class="flag flag-es" alt="United States"> <span> Español</span> <i class="fa fa-angle-down"></i> </a>
								<ul class="dropdown-menu pull-right">
									<li class="active">
										<a href="javascript:void(0);"><img src="<?php echo ASSETS_URL; ?>/img/blank.gif" class="flag flag-es" alt="Spanish"> Español (MX)</a>
									</li>
									<li>
										<a href="javascript:void(0);"><img src="<?php echo ASSETS_URL; ?>/img/blank.gif" class="flag flag-fr" alt="France"> Français</a>
									</li>
									<li>
										<a href="javascript:void(0);"><img src="<?php echo ASSETS_URL; ?>/img/blank.gif" class="flag flag-us" alt="United States"> US</a>
									</li>
									<li>
										<a href="javascript:void(0);"><img src="<?php echo ASSETS_URL; ?>/img/blank.gif" class="flag flag-de" alt="German"> Deutsch</a>
									</li>						
								</ul>
							</li>
						</ul>
						
						<!-- end multiple lang -->

					</div>
					<!-- end pulled right: nav area -->

				</header>
				<!-- END HEADER -->

				<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
				Note: These tiles are completely responsive,
				you can add as many as you like
				-->
				<div id="shortcut">
					<ul>
						<li>
							<a href="#ajax/inbox.php" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Correo <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
						</li>
						<li>
							<a href="#ajax/calendar.php" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendario</span> </span> </a>
						</li>
						<li>
							<a href="#ajax/invoice.php" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Factura <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
						</li>
						<li>
							<a href="#ajax/profile.php" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>Perfil </span> </span> </a>
						</li>
					</ul>
				</div>
				<!-- END SHORTCUT AREA -->

		<?php
			}
		?>