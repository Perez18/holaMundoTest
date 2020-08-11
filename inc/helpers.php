
<?php

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}

class helpers
{

   private $fields = [];

   const URL_APLICACION = '../front/index.php';


   static function printHolamundo()
   { //agregado



      global $DB, $CFG_GLPI, $LANG;

      $itemtype            = 0;
      $items_id            = "";
      $content             = "";
      $title               = "";
      $ticketcategories_id = 0;
      $urgency             = 3;
      $type                = 0;

      echo "Hola mundo...de aqui puedo llamar a cualquier cosa";
   }

   static function printHolamundo2()
   { //agregado


      global $DB, $CFG_GLPI, $LANG;

      $itemtype            = 0;
      $items_id            = "";
      $content             = "";
      $title               = "";
      $ticketcategories_id = 0;
      $urgency             = 3;
      $type                = 0;

      echo "aqui podría estar otro código que tenga relación con la creación";
   }

   static function redireccionar()
   {

      return   header('location:' . self::URL_APLICACION);
   }


   static function AddCss()
   {

      echo ' <link rel="stylesheet" href="../css/holamundo.css">';
   }

   static function getComputer()
   {

      global $DB;

      $query = "SELECT * FROM  glpi_computers ";
      $result = self::queryResult($query);

      return $result;

   }

   static function getPrinter()
   {

      global $DB;

      $query = "SELECT * FROM  glpi_printers ";

      $result = self::queryResult($query);

      return $result;
   }

   static function queryResult($query)
   {
      global $DB;


      $result = $DB->query($query);

      if ($DB->numrows($result) > 0) {

         return $DB->fetchAssoc($result);
      }
   }

   
}
