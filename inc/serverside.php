<?php

class TableData { 
 	private $_db;
	public function __construct() {
		try {			
			$host		= "localhost";
			$database	= "glpi";
			$user		= "anthony18";
			$passwd		= "password18";
			
		    $this->_db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $passwd, array(
				PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		} catch (PDOException $e) {
		    error_log("Failed to connect to database: ".$e->getMessage());
		}				
	}	
	public function get($table, $index_column, $columns) {
		// Paging
		$sLimit = "";
		if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' ) {
			$sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".intval( $_POST['iDisplayLength'] );
		}
		
		// Ordering
		$sOrder = "";
		if ( isset( $_POST['iSortCol_0'] ) ) {
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ ) {
				if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" ) {
					$sortDir = (strcasecmp($_POST['sSortDir_'.$i], 'ASC') == 0) ? 'ASC' : 'DESC';
					$sOrder .= "`".$columns[ intval( $_POST['iSortCol_'.$i] ) ]."` ". $sortDir .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ) {
				$sOrder = "";
			}
		}
		
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		$sWhere = "";
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" ) {
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($columns) ; $i++ ) {
				if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" ) {
					$sWhere .= "`".$columns[$i]."` LIKE :search OR ";
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		// Individual column filtering
		for ( $i=0 ; $i<count($columns) ; $i++ ) {
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' ) {
				if ( $sWhere == "" ) {
					$sWhere = "WHERE ";
				}
				else {
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$columns[$i]."` LIKE :search".$i." ";
			}
		}
		
		// SQL queries get data to display
		$sQuery = "SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $columns))."` FROM `".$table."` ".$sWhere." ".$sOrder." ".$sLimit;
		$statement = $this->_db->prepare($sQuery);
		
		// Bind parameters
		if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" ) {
			$statement->bindValue(':search', '%'.$_POST['sSearch'].'%', PDO::PARAM_STR);
		}
		for ( $i=0 ; $i<count($columns) ; $i++ ) {
			if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' ) {
				$statement->bindValue(':search'.$i, '%'.$_POST['sSearch_'.$i].'%', PDO::PARAM_STR);
			}
		}

		$statement->execute();
		$rResult = $statement->fetchAll();
		
		$iFilteredTotal = current($this->_db->query('SELECT FOUND_ROWS()')->fetch());
		
		// Get total number of rows in table
		$sQuery = "SELECT COUNT(`".$index_column."`) FROM `".$table."`";
		$iTotal = current($this->_db->query($sQuery)->fetch());
		
		// Output
		$output = array(
			/*"draw" =>  /* intval($_POST['draw']),  1,
			"recordsTotal" => intval($iTotal),
			"recordsFiltered" => intval($iFilteredTotal),*/
			"data" => array()
		);
		
		// Return array of values
		foreach($rResult as $aRow) {
			$row = array();			
			for ( $i = 0; $i < count($columns); $i++ ) {
				if ( $columns[$i] == "version" ) {
					// Special output formatting for 'version' column
					$row[] = ($aRow[ $columns[$i] ]=="0") ? '-' : $aRow[ $columns[$i] ];
				}
				else if ( $columns[$i] != ' ' ) {
					$row[] = $aRow[ $columns[$i] ];
				}
			}
			$output['data'][] = $row;
		}
		
		echo  json_encode( $output );
	}
}
header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate');
// Create instance of TableData class
$table_data = new TableData();
$table_data->get("glpi_computers","id",["name","serial"]);


?>