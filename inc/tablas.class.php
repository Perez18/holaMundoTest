<?php
/*
*/

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access directly to this file");
}


class tabla extends PluginHolamundoIndex
{


    public function formIndex()
    {
 
       echo '<div id="tabs495850716" class="center vertical ui-tabs ui-corner-all ui-widget ui-widget-content ui-tabs-vertical ui-helper-clearfix ui-corner-left" style="margin-top:20px;">';
       echo  "<h1>".self::getTypeName(1)."</h1>";
       echo '<ul role ="tab" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">';
       self::tableAsideDepreciacion();
       self::tableAsideAmortizacion();
       echo '</ul>';
       self::tableAssets();
       echo "</div>";
       html::closeForm();
 
       $menu['icon'] = self::getIcon();
    }
 


    static function tableAssets()
    {
 

        $variable = "inicio";
        echo '<table class="tab_cadre_fixe">';
        echo '<thead>';
        echo '<tr  class="tab_bg_2">';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">First</th>';
        echo '       <th scope="col">Last</th>';
        echo '       <th scope="col">Handle</th>';
        echo '    </tr>';
        echo ' </thead>';
        echo ' <tbody>';
        echo '    <tr>';
        echo '       <th scope="row">1</th>';
        echo "       <td> {$variable} </td>";
        echo "       <td>{$variable}</td>";
        echo '       <td>@mdo</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '       <th scope="row">2</th>';
        echo '       <td>Jacob</td>';
        echo '       <td>Thornton</td>';
        echo '       <td>@fat</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '       <th scope="row">3</th>';
        echo '       <td>Larry</td>';
        echo '       <td>the Bird</td>';
        echo '       <td>@twitter</td>';
        echo '    </tr>';
        echo ' </tbody>';
        echo ' </table>';
    }



   static function tableAsideDepreciacion(){
      

    echo "<li class='tab-depreciacion ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='#'>Depreciacion<a></li>";
    echo "<li class='ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href= '".self::getLinks('computer')."'>Computer<a></li>";
    echo "<li class='ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='".self::getLinks('printer')."'>Printer</a></li>";
 }



 static function tableAsideAmortizacion(){
    echo "<li class='tab-depreciacion ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='#'>Amortizacion<a></li>";
    echo "<li class='ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='#'>Mobiliario<a></li>";
    echo "<li class='ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='#'>Terreno</a></li>";
 }


 
static function getLinks($activo)
{
   global $CFG_GLPI;
   $links = array();

   //   $links['config'] = '/plugins/holamundo/front/link_cualquiera.php';
   //  $links["<img  src='".$CFG_GLPI["root_doc"]."/pics/menu_showall.png' title='".__s('Show all')."' alt='".__s('Show all')."'>"] = '/plugins/holamundo/front/link_cualquiera.php';
   $links[__s('activo', 'holamundo')] = '../inc/controlador.php?activo='.$activo.'';

   return $links['activo'];
}



static function ShowComputer()
{
    $variable = "computer";
    echo '<table class="tab_cadre_fixe">';
    echo '<thead>';
    echo '<tr  class="tab_bg_2">';
    echo '<th scope="col">#</th>';
    echo '<th scope="col">First</th>';
    echo '       <th scope="col">Last</th>';
    echo '       <th scope="col">Handle</th>';
    echo '    </tr>';
    echo ' </thead>';
    echo ' <tbody>';
    echo '    <tr>';
    echo '       <th scope="row">1</th>';
    echo "       <td> {$variable} </td>";
    echo "       <td>{$variable}</td>";
    echo '       <td>@mdo</td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '       <th scope="row">2</th>';
    echo '       <td>Jacob</td>';
    echo '       <td>Thornton</td>';
    echo '       <td>@fat</td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '       <th scope="row">3</th>';
    echo '       <td>Larry</td>';
    echo '       <td>the Bird</td>';
    echo '       <td>@twitter</td>';
    echo '    </tr>';
    echo ' </tbody>';
    echo ' </table>';
}


}
