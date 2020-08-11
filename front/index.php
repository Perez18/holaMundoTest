

<?php
/*
 *
 -------------------------------------------------------------------------
 Plugin GLPI Example
 */

include("../../../inc/includes.php");
include('../inc/helpers.php'); //aqui esta parte de la lógica
include('../inc/activos.class.php');

Session::checkLoginUser();
/* session_start();
 */


$plugin = new Plugin();


if (!$plugin->isInstalled("holamundo") || !$plugin->isActivated("holamundo")) {
   Html::displayNotFoundError();
}



Session::checkRight('plugin_holamundo', READ);



Html::header(
   __('Hola Mundo', 'holamundo'),
   $_SERVER["PHP_SELF"], //Ubicacion completta string(39) "/glpi/plugins/holamundo/front/index.php" 
   'plugins', //nombre de ubicacion en glpi
   "PluginHolamundoIndex" //nombre de clase display ubicacdo en inc
);


//podriamos llamar a las funciones desde cualquier lado con include
//printHolamundo(); ó  utilizamos la herencia de la clase index


if (!isset($_GET['activo']) || $_GET['activo'] == null) {

   $_GET['activo'] = false;
}

$activo = isset($_GET['activo']) ? trim($_GET['activo']) : false;;

helpers::AddCss();
$app = new activos();

switch ($activo) {
   case 'computer':


      $app->SetAsset('computer');
      $app->formIndex();

      break;

   case 'printer':
      $app->SetAsset('printer');
      $app->formIndex();

      break;

   case 'monitor':
      $app->SetAsset('monitor');
      $app->formIndex();

      break;


   case 'mobiliario':
      $app->SetAsset('mobiliario');
      $app->formIndex();

      break;

   case 'recintos':
      $app->SetAsset('recintos');
      $app->formIndex();

      break;


   default:
      $app->SetAsset('inicio');
      $app->formIndex();

      break;
}



if (Session::getCurrentInterface() == "helpdesk") {
   Html::helpFooter();
} else {
   Html::footer();
}
