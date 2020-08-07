
<?php

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}


function printHolamundo () {//agregado


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

function printHolamundo2 () {//agregado


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


function add_css()
{ 

echo ' <link rel="stylesheet" href="../css/holamundo.css">';


    
 }
