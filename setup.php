
<?php

/*
 *
  -------------------------------------------------------------------------
  Plugin GLPI hola mundo
 */

function plugin_init_holamundo()
{
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['holamundo'] = true;
    $PLUGIN_HOOKS['change_profile']['holamundo'] = array('PluginHolamundoProfile', 'changeProfile');


    Plugin::registerClass('PluginHolaMundoindex', [
        'asset_types'            => true,
        'linkgroup_types'        => true,
        'linkgroup_tech_types'   => true,
        'linkuser_tech_types'    => true,
        'document_types'         => true,
        'ticket_types'           => true,
        'helpdesk_visible_types' => true,
        'addtabon'               => ['Computer', 'Monitor'
        ]
     ]);

    //aquí esta registrando la clase profile que es la que desencadena todo en este ejemplo
    Plugin::registerClass('PluginHolamundoProfile', ['addtabon' =>['Profile']]);
    $plugin = new Plugin();

    $PLUGIN_HOOKS['add_css']['test'] = [
        'css/holamundo.css',
        'css/holamundo.min.css'
    ];

    $PLUGIN_HOOKS['add_javascript']['test'] = [
        'js/holamundo.js'
    ];

    if (isset($_SESSION['glpiID']) && $plugin->isInstalled('holamundo') && $plugin->isActivated('holamundo')) {
        if (Session::haveRight('plugin_holamundo', READ)) {

            //aquí se agrega al menú complementos   
            $PLUGIN_HOOKS['menu_toadd']['holamundo'] = array(
                'plugins' => 'PluginHolamundoIndex'//=> esta clase se encuentra en la carpeta front/index.class.php
            ); 

        }
    }
}

function plugin_version_holamundo()
{
    global $LANG;

    return array(
        'name' => __('Hola Mundo', 'holamundo'),
        'version' => '1.1.0',
        'author' => "Anthony Perez",
        'license' => "GPLv2+",
        'homepage' => 'https://glpiconchale.blogspot.com',
        'minGlpiVersion' => '9.5' //aqui le digo que mi plugin va a trabajar con la versión minima de glpi
    );
}

function plugin_holamundo_check_prerequisites()
{
    if (GLPI_VERSION >= 9.2) { //aqui le digo que el prerequisito es la versión 9.2 de glpi
        return true;
    } else {  //aquí le mando un mensaje si no tiene instalada la versión de glpi que yo deseo, y no lo deja instalar el plugin
        echo "La versión de GLPI no es compatible. Requiere GLPI 9.2";
        return false;
    }
}

function plugin_holamundo_check_config()
{
    return true;
}
