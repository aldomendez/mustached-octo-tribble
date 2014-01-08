<?php

include "inc/database.php";
ini_set('display_errors','off');
ini_set('date.timezone', 'America/Mexico_City');
ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE);

$db = new MxApps();
echo "<pre>";
print_r($_POST);

if (isset($_POST['PROCESS']) && $_POST['PROCESS'] !== ''){
	if (function_exists($_POST['PROCESS'])) {
		$_POST['PROCESS']();
	}
}

function redirect()
{
	global $db;
	/* Redirect browser */

	if ($db->state) {
		$db->query('select max(id) id from ' . $tabla[$_POST['PROCESS']]);
		$message = "success/" . $_POST['PROCESS'] . "/" . ($db->results[0]['ID'] + 2);
	} else {
		$message = "error/" . urlencode($db->oci_error_message['message']);
	}

	header("Location: " . $_SERVER['HTTP_REFERER'] . "#/" . $message);
	/* Make sure that code below does not get executed when we redirect. */
	exit;
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
	// Tomamos el valor de la tabla de acuerdo a los procesos que corremos
	$tabla = array(
		'ICRX2' => 'shear_icrx2',
		'SuperNovaROSA_HIC' => 'supernovarosa_hic',
		'PMQPSK' => 'shear_pmkpsk',
		'DiamondROSA_HIC' => 'DiamondROSA_HIC'
	);
	$db->query('select max(id) id from ' . $tabla[$_POST['PROCESS']]);
	// $db->results[0]['ID']  << Este valor representa de la lista de valores que retorna el query
	//                           el primer valor de la lista ID
	return str_replace(':ID', $db->results[0]['ID'] + 2 , $file);
}

function ICRX2()
{
	// Hace visible el valor $db dentro de la funcion
	global $db;
	$file = file_get_contents('sql/insert_ICRX2.sql');

	// Sustituimos todas las variables
	$file = bind_id($file);
	$file = bind($file, 'PROCESS');
	$file = bind($file, 'SERIAL_NUM');
	$file = bind($file, 'SYSTEM_ID');
	$file = bind($file, 'USER_ID');
	$file = bind($file, 'COMMENTS');
	$file = bind($file, 'PASSFAIL');
	$file = bind($file, 'DIODO_1');
	$file = bind($file, 'DIODO_2');


	// Despues de sustituir todas las variables,
	// insertamos en la base de datos
	$db->insert($file);
	redirect();
}

function SuperNovaROSA_HIC()
{
	// Hace visible el valor $db dentro de la funcion
	global $db;
	$file = file_get_contents('sql/insert_SuperNovaROSA_HIC.sql');

	// Sustituimos todas las variables
	$file = bind_id($file);
	$file = bind($file, 'PROCESS');
	$file = bind($file, 'SERIAL_NUM');
	$file = bind($file, 'SYSTEM_ID');
	$file = bind($file, 'USER_ID');
	$file = bind($file, 'COMMENTS');
	$file = bind($file, 'PASSFAIL');
	$file = bind($file, 'DIODO_1');
	$file = bind($file, 'TIA_1');
	$file = bind($file, 'TIA_2');
	$file = bind($file, 'TIA_3');
	$file = bind($file, 'TIA_4');
	$file = bind($file, 'TIA_5');
	$file = bind($file, 'CAPACITOR_1');
	$file = bind($file, 'CAPACITOR_2');
	$file = bind($file, 'CAPACITOR_3');
	$file = bind($file, 'CAPACITOR_4');
	$file = bind($file, 'CAPACITOR_5');


	// Despues de sustituir todas las variables,
	// insertamos en la base de datos
	$db->insert($file);
	redirect();
}

function PMQPSK()
{
	// Hace visible el valor $db dentro de la funcion
	global $db;
	$file = file_get_contents('sql/insert_PMQPSK.sql');

	// Sustituimos todas las variables
	$file = bind_id($file);
	$file = bind($file, 'PROCESS');
	$file = bind($file, 'SERIAL_NUM');
	$file = bind($file, 'SYSTEM_ID');
	$file = bind($file, 'USER_ID');
	$file = bind($file, 'COMMENTS');
	$file = bind($file, 'PASSFAIL');
    $file = bind($file, 'DIODO_1');
    $file = bind($file, 'DIODO_2');
    $file = bind($file, 'DIODO_3');
    $file = bind($file, 'DIODO_4');


	// Despues de sustituir todas las variables,
	// insertamos en la base de datos
	$db->insert($file);
	redirect();
}

function DiamondROSA_HIC()
{
	// Hace visible el valor $db dentro de la funcion
	global $db;
	$file = file_get_contents('sql/insert_DiamondROSA_HIC.sql');

	// Sustituimos todas las variables
	$file = bind_id($file);
	$file = bind($file, 'PROCESS');
	$file = bind($file, 'SERIAL_NUM');
	$file = bind($file, 'SYSTEM_ID');
	$file = bind($file, 'USER_ID');
	$file = bind($file, 'COMMENTS');
	$file = bind($file, 'PASSFAIL');
    $file = bind($file, 'TIA_1');
    $file = bind($file, 'TIA_2');
    $file = bind($file, 'TIA_3');
    $file = bind($file, 'TIA_4');
    $file = bind($file, 'CAPACITOR_1');
    $file = bind($file, 'CAPACITOR_2');
    $file = bind($file, 'CAPACITOR_3');
    $file = bind($file, 'CAPACITOR_4');
    $file = bind($file, 'CAPACITOR_5');
    $file = bind($file, 'CAPACITOR_6');
    $file = bind($file, 'CAPACITOR_7');
    $file = bind($file, 'CAPACITOR_8');
    $file = bind($file, 'CAPACITOR_SMT');


	// Despues de sustituir todas las variables,
	// insertamos en la base de datos
	$db->insert($file);
	redirect();
}