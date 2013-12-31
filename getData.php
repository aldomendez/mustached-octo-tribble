<?php

include "inc/database.php";
ini_set('display_errors','off');
ini_set('date.timezone', 'America/Mexico_City');
ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE);

$db = new MxApps();
// echo "<pre>";
// print_r($_SERVER);

if (isset($_GET['process']) && $_GET['process'] !== ''){

	getData();

}


function getData()
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
	// echo('select * from ' . $tabla[$_GET['process']] . ' Where id = ' . $_GET['id']);
	$db->query('select * from ' . $tabla[$_GET['process']] . ' Where id = ' . $_GET['id'] );
	echo $db->json();
}
