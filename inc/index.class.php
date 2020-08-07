

<?php

/*
 *
  -------------------------------------------------------------------------
  Plugin GLPI Example
  Copyright (C) 2017 by Walid H.
 */

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}

class PluginHolamundoIndex extends CommonDBTM
{

   static $rightname = 'plugin_holamundo';

   /**
    *
    * @return type
    */
   public static function getTypeName($nb = 0)
   {

      return __('Hola Mundo ', 'holamundo');
   }

   function getTabNameForItem(CommonGLPI $item, $withtemplate = 0)
   {

      return self::createTabEntry(self::getTypeName(1));
   }

   static function displayTabContentForItem(CommonGLPI $item, $tabnum = 1, $withtemplate = 0)
   {



      echo '<form action="../plugins/biblioteca/front/biblioteca.form.php" method="POST">';
      echo $item->getType();
      echo '<br>';
      echo $item->getTypeName();
      echo '<br>';
      echo Html::Hidden('id', ['value' => $item->getID()]);
      echo Html::hidden('_glpi_csrf_token', ['value' => Session::getNewCSRFToken()]);
      echo '<div class="spaced" id="tabsbody">';
      echo '<table class="tab_cadre_fixe">';
      echo ' <tr class="tab_bg_1">';
      echo '  <td>';
      echo ' <p>Añadir Biblioteca</p>';
      echo ' <input type="text"  size="50" name="name"  class="ui-autocomplete-input" autocomplete="off" >';
      echo '<input type="submit" value="Ver Tabla" class="submit" name="clone">';
      echo '</td></tr></table></div>';
      echo '</form>';

      return true;
   }
   /**
    * Show the form (menu->plugin->holamundo)
    */
   public function formIndex()
   {

      echo "<form action='' method='post'  > ";
      echo '<div class="tab_cadre_fixe" style="box-shadow: 0 1px 8px #aaa;text-align:center;padding:1em;">';
      echo "<h1>Ver holamundo</h1>";
      echo "<p>...</p>";
      echo "</div>";
      html::closeForm();

      $menu['icon'] = self::getIcon();
   }

   static function getIcon()
   {
      return "fas fa-cat";
   }


   /**
    * @see CommonGLPI::getAdditionalMenuLinks()
    **/
   static function getAdditionalMenuLinks()
   {
      global $CFG_GLPI;
      $links = array();

      //   $links['config'] = '/plugins/holamundo/front/link_cualquiera.php';
      //  $links["<img  src='".$CFG_GLPI["root_doc"]."/pics/menu_showall.png' title='".__s('Show all')."' alt='".__s('Show all')."'>"] = '/plugins/holamundo/front/link_cualquiera.php';
      $links[__s('Ver Links', 'holamundo')] = '/plugins/holamundo/front/link_cualquiera.php';

      return $links;
   }
}
