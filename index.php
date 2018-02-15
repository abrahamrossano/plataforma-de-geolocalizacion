<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC. */

	require_once("libreria/sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
        include_once('libreria/database.php');
        include_once('libreria/config.php');
        include_once('libreria/consulta.php');
        
        $sql= new database(HOST, USER, PASSWD, DATABASE);
        $con= new consulta($sql);
        
        $lista = $con->getInfoUsuario($usuario);
        foreach($lista as $fila){ 
            $id = $fila["id_usuario"];
            $nick = $fila["usuario"];
            $foto = $fila["foto"];
        }
        //echo $id . $nick . $foto;
        $idU = $sesion->set("id",$id);

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">
	
	</div>
	<!-- END MAIN CONTENT -->
	
</div>
<!-- END MAIN PANEL -->

<!-- FOOTER -->
	<?php
		include("inc/footer.php");
	?>
<!-- END FOOTER -->

<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
	//include footer
	include("inc/google-analytics.php"); 
    }
?>