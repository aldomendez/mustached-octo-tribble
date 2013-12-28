<?php

include "inc/database.php";
ini_set('display_errors','off');
ini_set('date.timezone', 'America/Mexico_City');
ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE);

$db = new MxApps();
echo "<pre>";
print_r($_POST);

if (isset($_POST['process']) && $_POST['process'] !== ''){
	if (function_exists($_POST['process'])) {
		$_POST['process']();
	}
}

function bind($file, $value)
{
	return str_replace(':'.$value, ($_POST[$value]?"'".$_POST[$value]."'":"''"), $file);
}

function bind_id($file)
{
	global $db;
	$db->query('select max(id) id from shear_icrx2');
	echo $value, $db->results[0]['ID'];
	return str_replace(':id', $db->results[0]['ID'] + 2 , $file);
}

function ICRX2()
{
	// Hace visible el valor $db dentro de la funcion
	global $db;
	$file = file_get_contents('sql/insert_ICRX2.sql');

	// Sustituimos todas las variables
	$file = bind_id($file);
	$file = bind($file, 'process');
	$file = bind($file, 'serial_num');
	$file = bind($file, 'system_id');
	$file = bind($file, 'user_id');
	$file = bind($file, 'comments');
	$file = bind($file, 'passfail');
	$file = bind($file, 'Diodo_1');
	$file = bind($file, 'Diodo_2');


	// Despues de sustituir todas las variables,
	// insertamos en la base de datos
	$db->insert($file);
}