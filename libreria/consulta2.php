<?php
class consulta{
	private $sql;
	private $datos= array("nombre"=>"", "ape_p"=>"", "ape_m"=>"","mail"=>"","empresa"=>"","id_user"=>"");

	function consulta($sql){
		$this->sql = $sql;
	}

	function setDatos($dat){
		foreach($this->datos as $k =>$v)
			$this->datos[$k]= $dat[$k];
	}
    
    function getInfo(){
		$query = sprintf("SELECT L1.*  FROM localizacion L1 LEFT JOIN localizacion L2 ON (L1.id_users = L2.id_users AND L1.idlocalizacion < L2.idlocalizacion) WHERE L2.idlocalizacion IS NULL",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getInfoRep($usu){
		$query = sprintf("select id_unidad, num_unidad from unidad where usuario = %s and baja3 = false",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getInfoMapa($usu,$uni){
		$query = sprintf("select U.num_unidad, U.placa_unidad, C.nombre_chofer, C.ape_p, C.ape_m, C.foto_chofer, C.num_licencia from ((unidad as U inner join chofer_unidad as CU on U.id_unidad = CU.id_unidad) inner join chofer as C on CU.id_chofer = C.id_chofer) where U.baja3 = false and C.baja = false and U.usuario = %s and U.id_unidad = %s",
		GetSQLValueString($usu,"text"),
        GetSQLValueString($uni,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getInfoUsuario($usu){
		$query = sprintf("SELECT id_usuario, usuario, foto FROM usuario where baja = false AND email = %s ",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getInfoUni($usu){
		$query = sprintf("SELECT U.id_unidad, U.num_unidad, U.placa_unidad  FROM ((unidad as U INNER JOIN chofer_unidad ON U.id_unidad = chofer_unidad.id_unidad) inner join chofer on chofer_unidad.id_chofer = chofer.id_chofer) where chofer.id_usuario1 = %s AND U.baja3 = false",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getInfoUniCho($usu){
		$query = sprintf("select cu.id_cu, c.nombre_chofer, c.ape_p, c.ape_m, c.num_licencia, u.num_unidad, u.placa_unidad FROM ((chofer_unidad as cu INNER JOIN chofer as c ON cu.id_chofer = c.id_chofer) inner join unidad as u on u.id_unidad = cu.id_unidad) where c.id_usuario1 = %s AND u.baja3 = false and c.baja=false",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getInfoUser($usu){
		$query = sprintf("SELECT id_user, nombre, ape_p, ape_m, mail, id_empresa1 FROM user WHERE mail = %s ",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}

	function actEntradas(){
		$query = sprintf("UPDATE user SET nombre = %s, ape_p = %s, ape_m = %s, mail = %s, id_empresa1 = %s WHERE id_user = %s",
			GetSQLValueString($this->datos["nombre"],"text"),
			GetSQLValueString($this->datos["ape_p"],"text"),
			GetSQLValueString($this->datos["mail"],"text"),
			GetSQLValueString($this->datos["empresa"],"int"),
			GetSQLValueString($this->datos["mail"],"text"),
            GetSQLValueString($this->datos["id_user"],"int"));
			$this->sql->setQuery($query);
			$this->sql->query();
			if ($this->sql->errorNum==0) {
				$re = 0;
			} else {
				$re = 1;
			}

		return $re;
	}

	function eliLog($usu){
		$query = sprintf("UPDATE login SET baja = true WHERE id = %s ",
        GetSQLValueString($usu,"int"));
        $this->sql->setQuery($query);
        $this->sql->query();
		if ($this->sql->errorNum==0) {
			$re = 0;
		} else {
			$re = 1;
		}

		return $res;
	}

	function insEntradas(){
		$re = 0;
		//Busamos si el usuario no se sido dado de alta previamente.
		$query= sprintf("SELECT entrada.idEntrada FROM entrada WHERE entrada.titulo = %s AND entrada.baja = false ",
				GetSQLValueString($this->datos["titulo"],"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if(count($res) == 0){
			//al no existir se debe insertar el usuario
			$ins = sprintf("INSERT INTO entrada (titulo, texto, archivo, imagen, autor, fechaReg, baja) VALUES (%s, %s, %s, %s, %s, NOW(), false) ",
				GetSQLValueString($this->datos["titulo"],"text"),
				GetSQLValueString($this->datos["texto"],"text"),
				GetSQLValueString($this->datos["archivo"],"text"),
				GetSQLValueString($this->datos["imagen"],"text"),
				GetSQLValueString($this->datos["autor"],"text"));

			$this->sql->setQuery($ins);
			$this->sql->query();

			if ($this->sql->errorNum==0)
				$re = 0;
			else
				$re = 2;

		} else {
			$re = 1;
		}

		return $re;
	}

}

?>
