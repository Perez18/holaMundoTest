<?php
/*
*/

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access directly to this file");
}


class activos extends PluginHolamundoIndex
{

    private $asset;



    public function SetAsset($asset)
    {

        $this->asset = $asset;
    }



    public function formIndex()
    {

        echo '<div class="center vertical ui-tabs ui-corner-all ui-widget ui-widget-content ui-tabs-vertical ui-helper-clearfix ui-corner-left" style="margin-top:20px;">';
        echo  "<h1>" . ucwords($this->asset) . "</h1>";
        echo '<ul role ="tab" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">';
        $this->TableAsideDepreciacion();
        $this->TableAsideAmortizacion();
        echo '</ul>';
        if ($this->asset == "inicio") {
            echo  "<i class ='" . self::getIcon() . "'></i>";
        } else {
            $this->TableInformation();
        }
        echo "</div>";
        html::closeForm();

        $menu['icon'] = self::getIcon();
    }



    public function TableInformation()
    {
        /*         $dbu = new DbUtils();
        echo $dbu->countElementsInTable('glpi_computers',['id' => '1']);
       var_dump($this->getDBAll());     */

        global $DB;

        $result =  $this->getDBAll();
        $domains = [];
        $used    = [];



        echo '<table id ="myTable" class="tab_cadre_fixe" style="width: 80%; font-size:12px;" >';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Nombre</th>';
        echo '       <th scope="col">No Factura</th>';
        echo '       <th scope="col">Fecha Compra</th>';
        echo '       <th scope="col">Vida Util</th>';
        echo '       <th scope="col">valor</th>';
        echo '       <th scope="col">Valor Neto</th>';
        echo '       <th scope="col">Compañia</th>';
        echo '       <th scope="col">Centro Costo</th>';
        echo '       <th scope="col">Usuario</th>';
        echo '       <th scope="col">Grafica</th>';
        echo '       <th scope="col">glpi</th>';
        echo '    </tr>';
        echo ' </thead>';
        echo ' </table>';
        /*       echo '<table id ="tab_information" class="tab_cadre_fixe">';
        echo '<thead>';
        echo '<tr  class="tab_bg_2">';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Nombre</th>';
        echo '       <th scope="col">No Factura</th>';
        echo '       <th scope="col">Fecha Compra</th>';
        echo '       <th scope="col">Vida Util</th>';
        echo '       <th scope="col">valor</th>';
        echo '       <th scope="col">Valor Neto</th>';
        echo '       <th scope="col">Compañia</th>';
        echo '       <th scope="col">Centro Costo</th>';
        echo '       <th scope="col">Usuario</th>';
        echo '       <th scope="col">Grafica</th>';
        echo '       <th scope="col">glpi</th>';
        echo '    </tr>';
        echo ' </thead>';

        echo ' <tbody>';


        if ($numrows = $DB->numrows($result)) {
            while ($data = $DB->fetchAssoc($result)) {
                echo '    <tr>';
                echo "       <th scope='row'>{$data['id']}</th>";
                echo  "        <td> {$data['name']}</td>";
                echo  "        <td> {$data['serial']}</td>";
                echo '    <tr>';
            }
        }

        echo ' </tbody>';
        echo ' </table>';
 */
    }



    public function TableAsideDepreciacion()
    {


        echo "<li class='tab-depreciacion ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='#'>Depreciacion</a></li>";
        echo "<li class='asset ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href= '" . self::getLinks(helpers::$types[0]) . "'>" . helpers::$types[0] . "</a></li>";
        echo "<li class='asset ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='" . self::getLinks(helpers::$types[1]) . "'>" . helpers::$types[1] . "</a></li>";
        echo "<li class='asset ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='" . self::getLinks(helpers::$types[5]) . "'>" . helpers::$types[5] . "</a></li>";
    }



    public function TableAsideAmortizacion()
    {
        echo "<li class=' tab-depreciacion ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='#'>Amortizacion</a></li>";
        echo "<li class='asset ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='" . self::getLinks('mobiliario') . "'>Mobiliario</a></li>";
        echo "<li class='asset ui-tabs-tab ui-corner-top ui-state-default ui-tab'> <a class='ui-tabs-anchor' href='" . self::getLinks('recintos') . "'>Recintos</a></li>";
    }




    static function getLinks($activo)
    {
        global $CFG_GLPI;
        $links = array();

        //   $links['config'] = '/plugins/holamundo/front/link_cualquiera.php';
        //  $links["<img  src='".$CFG_GLPI["root_doc"]."/pics/menu_showall.png' title='".__s('Show all')."' alt='".__s('Show all')."'>"] = '/plugins/holamundo/front/link_cualquiera.php';
        $links[__s('activo', 'holamundo')] = '../front/index.php?activo=' . $activo . '';

        return $links['activo'];
    }


    public function getDBAll()
    {

        global $DB;


        if ($this->asset ==  helpers::$types[0]) {

            $query = "SELECT * FROM glpi_computers";

            return $DB->query($query);
        }

        if ($this->asset ==  helpers::$types[1]) {

            $query = "SELECT * FROM glpi_monitors";

            return $DB->query($query);
        }


        if ($this->asset ==  helpers::$types[5]) {

            $query = "SELECT * FROM glpi_printers";

            return $DB->query($query);
        }


        return "";
    }
}
