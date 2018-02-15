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
        $dia = $sesion->get("dia");
        $ini = $sesion->get("ini");
        $fin = $sesion->get("fin");
        $idU = $sesion->get("idU");
        
        require("phpsqlajax_dbinfo.php");
        $inicio = $dia . " " .$ini;
        $final = $dia . " " .$fin;
        
        // Start XML file, create parent node
        
        $dom = new DOMDocument("1.0");
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);

        // Opens a connection to a MySQL server

        $connection=mysql_connect ('localhost', $username, $password);
        if (!$connection) {  die('Not connected : ' . mysql_error());}

        // Set the active MySQL database

        $db_selected = mysql_select_db($database, $connection);
        if (!$db_selected) {
          die ('Can\'t use db : ' . mysql_error());
        }

        // Select all the rows in the markers table

        $query = "select * from localizacion where fechaReg >= '$inicio'
            AND fechaReg <= '$final' AND id_users = $idU";
        $result = mysql_query($query);
        if (!$result) {
          die('Invalid query: ' . mysql_error());
        }

        header("Content-type: text/xml");

        // Iterate through the rows, adding XML nodes for each

        while ($row = @mysql_fetch_assoc($result)){
          // Add to XML document node
          $node = $dom->createElement("marker");
          $newnode = $parnode->appendChild($node);
          $newnode->setAttribute("name",$row['id_users']);
          $newnode->setAttribute("address", $row['fechaReg']);
          $newnode->setAttribute("lat", $row['lat']);
          $newnode->setAttribute("lng", $row['log']);
          $newnode->setAttribute("type", $row['type']);
        }

        echo $dom->saveXML();
    }
?>
