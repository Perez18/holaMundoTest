<?php
include ("../../../inc/includes.php");
include ('../inc/tablas.class.php');


Session::checkLoginUser();
/* session_start(); */



$plugin = new Plugin();
if (!$plugin->isInstalled("holamundo") || !$plugin->isActivated("holamundo")) {
   Html::displayNotFoundError();
}

Session::checkRight('plugin_holamundo', READ);

$app = new PluginHolamundoIndex();

Html::header(
   //$LANG['plugin_holamundo']['title'],
   __('Hola Mundo' , 'holamundo'),
   $_SERVER["PHP_SELF"],
   'plugins',
   "PluginHolamundoIndex"
);

//aqui va lo que ve el usuario




//$app->formIndex();

if (Session::getCurrentInterface() == "helpdesk") {
   Html::helpFooter();
} else {
   Html::footer();
}
