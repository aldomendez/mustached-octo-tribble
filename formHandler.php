<?php

include "inc/database.php";

$db = new MxApps();
echo "<pre>";
print_r($_POST);

if (isset($_POST['process']) && $_POST['process'] !== ''){
	if (function_exists($_POST['process'])) {
		$_POST['process']();
	}
}

function ICRX2()
{
	echo "Funciona hasta aqui";
	// Hace visible el valor $db dentro de la funcion
	global $db;
	$file = file_get_contents('sql/insert_ICRX2.sql');
	echo $db->name();
	// TODO: Buscar la menera de llevar el control de los *id*

	$file = str_replace(':id', ($_POST['id']?$_POST['id']:"''"), $file);
	$file = str_replace(':process', ($_POST['process']?$_POST['process']:"''"), $file);
	$file = str_replace(':serial_num', ($_POST['serial_num']?$_POST['serial_num']:"''"), $file);
	$file = str_replace(':system_id', ($_POST['system_id']?$_POST['system_id']:"''"), $file);
	$file = str_replace(':user_id', ($_POST['user_id']?$_POST['user_id']:"''"), $file);
	$file = str_replace(':comments', ($_POST['comments']?$_POST['comments']:"''"), $file);
	$file = str_replace(':passfail', ($_POST['passfail']?$_POST['passfail']:"''"), $file);
	$file = str_replace(':diodo_1', ($_POST['diodo_1']?$_POST['diodo_1']:"''"), $file);
	$file = str_replace(':diodo_2', ($_POST['diodo_2']?$_POST['diodo_2']:"''"), $file);


	// Al final despliega el valor del query 
	echo $file;
}


echo "</pre>";