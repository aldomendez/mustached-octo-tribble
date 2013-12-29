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
	// Toma el archivo original y lo reemplaza por el valor
	// que viene del formulario
	return str_replace(':'.$value, ($_POST[$value]?"'".$_POST[$value]."'":"''"), $file);
}

function bind_id($file)
{
	// Toma el valor maximo de la base de datos y lo devuelve como ID
	global $db;
	$tabla = array(
		'ICRX2' => 'shear_icrx2',
		'SuperNovaROSA_HIC' => 'supernovarosa_hic'
	);
	$db->query('select max(id) id from ' . $tabla[$_POST['process']]);
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

function SuperNovaROSA_HIC()
{
	// Hace visible el valor $db dentro de la funcion
	global $db;
	$file = file_get_contents('sql/insert_SuperNovaROSA_HIC.sql');

	// Sustituimos todas las variables
	$file = bind_id($file);
	$file = bind($file, 'process');
	$file = bind($file, 'serial_num');
	$file = bind($file, 'system_id');
	$file = bind($file, 'user_id');
	$file = bind($file, 'comments');
	$file = bind($file, 'passfail');
	$file = bind($file, 'Diodo_1');
	$file = bind($file,'TIA_1');
	$file = bind($file,'TIA_2');
	$file = bind($file,'TIA_3');
	$file = bind($file,'TIA_4');
	$file = bind($file,'TIA_5');
	$file = bind($file,'Capacitor_1');
	$file = bind($file,'Capacitor_2');
	$file = bind($file,'Capacitor_3');
	$file = bind($file,'Capacitor_4');
	$file = bind($file,'Capacitor_5');


	// Despues de sustituir todas las variables,
	// insertamos en la base de datos
	$db->insert($file);
}