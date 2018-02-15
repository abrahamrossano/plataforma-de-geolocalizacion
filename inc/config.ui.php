<?php

$breadcrumbs = array(
	"Home" => APP_URL
);


$page_nav = array(
	"dashboard" => array(
		"title" => "Panel de Control",
		"icon" => "fa fa-globe",
		"url" => "ajax/dashboard.php"
	),
	"geo-cercas" => array(
		"title" => "geo-cercas",
		"icon" => "fa fa-map-o",
		"sub" => array(
			"carousel" => array(
				"title" => "Carousel",
				"url" => 'ajax/geocercas.php'
			)
		)
	),
	"choferes" => array(
		"title" => "Choferes",
		"icon" => "fa fa-user",
		"sub" => array(
			"layouts" => array(
				"title" => "Registro de Choferes",
				"icon" => "fa fa-user-plus",
				"url" => "ajax/layouts.php"
			),
            "social" => array(
				"title" => "Lista de Choferes",
                "icon" => "fa fa-user",
				"url" => "ajax/lista.php"
			)
		)
	),
	"unidades" => array(
		"title" => "Unidades",
		"icon" => "fa fa-bus",
        "sub" => array(
			"aUnidades" => array(
				"title" => "Administrar Unidades",
                "icon" => "fa-dashboard",
				"url" => 'ajax/jqgrid.php'
			
		),
			"rUnidades" => array(
				"title" => "Registro de Unidades",
                "icon" => "fa-dashboard",
                "url" => "ajax/flot.php",
			))
	),
	"reportes" => array(
		"title" => "Reportes",
		"icon" => "fa-table",
        "url" => "ajax/table.php"
		
	),
	"pagos" => array(
		"title" => "pagos",
		"icon" =>  "fa fa-money",
        "url" => "ajax/factura.php"
		
	)
);

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>