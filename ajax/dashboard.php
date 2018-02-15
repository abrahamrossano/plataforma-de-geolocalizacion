<?php require_once("inc/init.php"); ?>

<div class="row">

    <!-- col -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title txt-color-blueDark text-center well">

            <!-- PAGE HEADER -->
            Panel de Control<br>
            <small class="text-success"></small>
        </h1>

    </div>
    <!-- end col -->

</div>

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->

    <div class="row">
        <article class="col-sm-12 col-md-12 col-lg-12">
            <!-- new widget -->
            <div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false">


                <header class="">
                    <span class="widget-icon"> <i class="fa fa-map-marker"></i> </span>
                    <h2>Mapa</h2>
                    <div class="widget-toolbar hidden-mobile">

                    </div>
                </header>

                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div style="width:100%; height:500px;" class="jarviswidget-editbox">
                        <div>
                            <label>Title:</label>
                            <input type="text" />
                        </div>
                    </div>
                    <!-- end widget edit box -->

                    <div class="widget-body no-padding">
                        <!-- content goes here -->


                        <!-- content goes here -->
                        <div id="style-selector-control" class="map-control" style="padding:16px; font-size:16px;">
                            <select id="style-selector" class="selector-control">
                                <option value="default" selected="selected">Por defecto</option>
                                <option value="silver">Crema</option>
                                <option value="night">Noche</option>
                            </select>
                        </div>
                        <div id="map" name="map" class="vector-map" style="width:100%; height:500px;"></div>
                        <script>
                            function initMap() {
                                // Create a map object and specify the DOM element for display.
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {
                                        lat: 19.041297,
                                        lng: -98.2062
                                    },
                                    scrollwheel: true,
                                    zoom: 14,
                                    disableDefaultUI: false,
                                    zoomControl: true
                                });

                                var trafficLayer = new google.maps.TrafficLayer();
                                trafficLayer.setMap(map);

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

                                /**downloadUrl('inicio.php', function(data) {
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
                                });**/

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
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD24LWCs86pgXqdvWiugdnx3ZTOxsOSEsI&callback=initMap" async defer></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#map');
                                refresh();
                            });

                            function refresh() {
                                setTimeout(function() {
                                    $('#map').fadeOut('medium').fadeIn('medium');
                                    refresh();
                                }, 30000);
                            }

                        </script>

                        <!-- end content -->
                        <table id="example" class="display projects-table table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Chofer</th>
                                    <th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Unidad</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Geocerca</th>
                                    <th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Entrada</th>
                                    <th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Salida</th>
                                    <th>Boton de Panico</th>
                                </tr>
                            </thead>
                        </table>


                        <!-- end content -->

                    </div>

                </div>
                <!-- end widget div -->
            </div>
        </article>

    </div>

    <!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
    pageSetUp();

    var pagefunction = function() {

        /* Formatting function for row details - modify as you need */
        function format(d) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-condensed">' +
                '<tr>' +
                '<td style="width:100px">Project Title:</td>' +
                '<td>' + d.name + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Deadline:</td>' +
                '<td>' + d.ends + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extra info:</td>' +
                '<td>And any further details here (images etc)...</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Comments:</td>' +
                '<td>' + d.comments + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Action:</td>' +
                '<td>' + d.action + '</td>' +
                '</tr>' +
                '</table>';
        }

        // clears the variable if left blank
        var table = $('#example').DataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "ajax": "data/dataList.json",
            "bDestroy": true,
            "iDisplayLength": 15,
            "columns": [{
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    "data": "name"
                },
                {
                    "data": "est"
                },
                {
                    "data": "contacts"
                },
                {
                    "data": "status"
                },
                {
                    "data": "target-actual"
                },
                {
                    "data": "starts"
                },
                {
                    "data": "ends"
                },
                {
                    "data": "tracker"
                },
            ],
            "order": [
                [1, 'asc']
            ],
            "fnDrawCallback": function(oSettings) {
                runAllCharts()
            }
        });



        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });

    };


    var pagedestroy = function() {


    }


    loadScript("js/plugin/datatables/jquery.dataTables.min.js", function() {
        loadScript("js/plugin/datatables/dataTables.colVis.min.js", function() {
            loadScript("js/plugin/datatables/dataTables.tableTools.min.js", function() {
                loadScript("js/plugin/datatables/dataTables.bootstrap.min.js", function() {
                    loadScript("js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });

</script>
