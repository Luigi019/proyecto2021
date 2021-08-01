<?php 
	session_start();
	// print_r($_POST);exit;

	if (!empty($_POST)) {
		//Extraer datos del producto
		if ($_POST['action'] == 'infoDoc') {

			echo 'Exito';
			exit;
		}

	}
	exit;
?>