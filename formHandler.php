<?php

include "inc/database.php";
ini_set('display_errors','off');
ini_set('date.timezone', 'America/Mexico_City');
error_reporting(E_ALL ^ E_NOTICE);

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
	// Hace visible el valor $db dentro de la funcion
	global $db;
	$file = file_get_contents('sql/insert_ICRX2.sql');

	// TODO: Buscar la menera de llevar el control de los *id*

	$file = bind($file, 'id');
	$file = bind($file, 'process');
	$file = bind($file, 'serial_num');
	$file = bind($file, 'system_id');
	$file = bind($file, 'user_id');
	$file = bind($file, 'comments');
	$file = bind($file, 'passfail');
	$file = bind($file, 'diodo_1');
	$file = bind($file, 'diodo_2');


	// Al final despliega el valor del query 
	echo $file;
}

function bind($file, $value)
{
	return str_replace(':'.$value, ($_POST[$value]?"'".$_POST[$value]."'":"''"), $file);
}


echo "</pre>";