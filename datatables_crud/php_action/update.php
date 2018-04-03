<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$nombre = $_POST['editnombre'];
	$historia = $_POST['edithistoria'];
	$horasalida = $_POST['edithorasalida'];
	$horaretorno = $_POST['edithoraretorno'];
	$especialidad = $_POST['editespecialidad'];
	$especialista = $_POST['editespecialista'];
	$active = $_POST['editActive'];

	$sql = "UPDATE members SET nombre='$nombre', historia='$historia', horasalida='$horasalida', horaretorno='$horaretorno', especialidad='$especialidad', especialista='$especialista', active='$active' WHERE id=$id";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Agregado exitosamente";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error al agregar la información del miembro";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}