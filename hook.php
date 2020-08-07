<?php
// plugin_"nombredelpluginenminúscula"_install() Nombre de la carpeta del plugin en el directorio plugins
function plugin_holamundo_install()
{
    global $DB;

    //PluginHolamundoProfile el Plugin"Nombredelpluginprimeraletramayúscula"Profile
    //donde Profile es un archivo ubicado en plugins/holamundo/inc/profile.class.php
    PluginHolamundoProfile::createFirstAccess($_SESSION['glpiactiveprofile']['id']);

    // aquí podrías crear tablas en la base de datos que luego tu aplicación necesite



    return true;
}

function plugin_holamundo_uninstall()
{
    global $DB;

    PluginHolamundoProfile::uninstallProfile();

    // aquí podrás eliminar las tablas que creaste en la base de datos

    return true;
}


