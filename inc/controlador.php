<?php

/**
 Controlador fronta
 @$_GET['VARIBALE']
 */
include ("../../../inc/includes.php");
include ('helpers.php'); 

if (!defined('GLPI_ROOT')) {
  die("Sorry. You can't access directly to this file");
}


if (!isset($_GET['activo']) || $_GET['activo'] == null ) {

  helpers::redireccionar();
    
}

$activo = isset($_GET['activo']) ? trim($_GET['activo']) : false;;


switch ($activo) {
   case 'computer':
    
    $valores = helpers::getComputer();

    var_dump($valores);
        
   break;

   case 'printer':
   
    $valores = helpers::getPrinter();
    var_dump($valores);

   break;

   default:
   helpers::redireccionar();

break;
}
   
