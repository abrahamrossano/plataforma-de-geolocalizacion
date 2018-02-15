<?php

include_once('../libreria/database.php');
include_once('../libreria/config2.php');
include_once('../libreria/consulta2.php');
$sql= new database(HOST, USER, PASSWD, DATABASE);
$con= new consulta($sql);

//$list = $con->getInfoRep($id);

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Select all the rows in the markers table

$query = "SELECT L1.*  FROM localizacion L1 LEFT JOIN localizacion L2 ON (L1.id_users = L2.id_users AND L1.idlocalizacion < L2.idlocalizacion) WHERE L2.idlocalizacion IS NULL";
$result = $con($query);

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

?>