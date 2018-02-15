<?php //require_once("inc/init.php"); 
require_once("../libreria/sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
        include_once('../libreria/database.php');
        include_once('../libreria/config.php');
        include_once('../libreria/consulta.php');
        $id = $sesion->get("id");
        $sql= new database(HOST, USER, PASSWD, DATABASE);
        $con= new consulta($sql);
        
        $list = $con->getInfoRep($id);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="author">
    <title>Reporte</title>
</head>

<body>

    <form method="post" action="ajax/reporte.php" target="_blank">
        <!--onsubmit="window.open('ajax/reporte.php', 'popup', opciones)" -->
        Fecha:
        <input type="date" id="dia" name="dia"><br><br> Hora inicio
        <input type="time" id="dia" name="inicio"><br><br> Hora fin
        <input type="time" id="dia" name="fin"><br><br> Unidad
        <select name="id_unidad">
            <?php foreach($list as $uni){ ?>
                <option value="<?php echo $uni['id_unidad']; ?>"><?php echo $uni['num_unidad']; ?></option>
            <?php } ?>
        </select><br><br>
        <input type="submit">
    </form>
    <script type="text/javascript">
            var opciones = "width=700,height=500,scrollbars=NO,top=100,left=100,directories=no,resizable=no,location=no";
    </script>
</body>

</html>
<?php } ?>
