

<?php
/*
 *
 -------------------------------------------------------------------------
 Plugin GLPI Example
 */

include ("../../../inc/includes.php");
include ('../inc/misfunciones.php'); //aqui esta parte de la lógica

Session::checkLoginUser();
/* session_start();
 */


$plugin = new Plugin();


if (!$plugin->isInstalled("holamundo") || !$plugin->isActivated("holamundo")) {
   Html::displayNotFoundError();
}



 Session::checkRight('plugin_holamundo', READ);


$app = new PluginHolamundoIndex();

Html::header(
   __('Hola Mundo' ,'holamundo'),
   $_SERVER["PHP_SELF"], //Ubicacion completta string(39) "/glpi/plugins/holamundo/front/index.php" 
   'plugins', //nombre de ubicacion en glpi
   "PluginHolamundoIndex" //nombre de clase display ubicacdo en inc
);


//podriamos llamar a las funciones desde cualquier lado con include
//printHolamundo(); ó  utilizamos la herencia de la clase index
/* 
add_css(); */

$app->formIndex();



if (Session::getCurrentInterface() == "helpdesk") {
   Html::helpFooter();
   
} else {
   Html::footer();

}

