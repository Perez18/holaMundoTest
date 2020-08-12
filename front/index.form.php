<?php
/*
 *
 -------------------------------------------------------------------------
 Plugin GLPI Example
 Copyright (C) 2017 by Walid H.
*/

include("../../../inc/includes.php");

Session::checkLoginUser();
/* session_start ();*/



$plugin = new Plugin();
if (!$plugin->isInstalled("holamundo") || !$plugin->isActivated("holamundo")) {
    Html::displayNotFoundError();
}

Session::checkRight('plugin_holamundo', READ);

$app = new PluginHolamundoIndex();

Html::header(
    /* $LANG['plugin_holamundo']['title'], */
    __('Hola Mundo' , 'holamundo'),
    $_SERVER["PHP_SELF"],
    'plugins',
    "PluginHolamundoIndex"
);


echo "<h2>FORMULARIO</h2>";




if (Session::getCurrentInterface() == "helpdesk") {
    Html::helpFooter();
} else {
    Html::footer();
}
