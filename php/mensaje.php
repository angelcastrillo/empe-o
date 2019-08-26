<?php
	session_start();

	include "../SMART/php/API/util.php";
	include "../SMART/php/API/query.php";
	
	
	$query = new query();
	$util = new util();
	
	$nombre = $_POST["nombre"];
	$asunto = $_POST["asunto"];
	$mes = $_POST["mensaje"]; 
	$email = $_POST["email"];
	
	$texto = $nombre." Ha escrito a traves de la pagina web";
	include "../SMART/php/notificaciones/modelo.php";
	
	
	
	if($query->insert(array("ASUNTO"=>$asunto." - ".$nombre,"CUERPO"=>$email."<br><br>".$mes,"ORIGEN"=>6),"EMAIL")){
		$EMAIL = (array) $query->select(array("ID"),"EMAIL","order by ID desc limit 1")[0]["ID"];
		
		//foreach($dato["DESTINO"] as $indice => $valor){
			$query->insert(array("EMAIL"=>$EMAIL[0],"DESTINO"=>7),"BUZON");
			$query->insert(array("NOTIFICACION"=>$pagina,"DESTINO"=>7),"NOTIFICACION");
		//};
		$util->respuesta("success","Mensaje Enviado");
	}else{
		$util->respuesta("success","Ha ocurrido un error y no se pudo enviar el mensaje");
	}
?>
