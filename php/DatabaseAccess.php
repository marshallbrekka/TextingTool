<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of DatabaseAccess
 *
 * @author Marshall
 */
class DatabaseAccess {

	private static $mysqli;
	private $result;

    public function  __construct($credentialsFile) {

		require dirname(__FILE__) . '/../config/' . $credentialsFile;
		
		$this->mysqli = new mysqli($host,
								$username,
								$password,
								$name);
		if ($this->mysqli->connect_errno) {
			
			throw new Exception('Database Connection Error');
		}

	}

	public function runQuery($sql) {
		$this->runSQL($sql);
	}

	public function getQueryAsNumericArray($sql) {	
		return $this->convertResultToArray($sql, MYSQLI_NUM);
	}

	public function getQueryAsAssociativeArray($sql) {
		return $this->convertResultToArray($sql, MYSQLI_ASSOC);
	}

	private function runSQL($sql) {
		$sanitizedSql = $this->mysqli->real_escape_string($sql);
		$result = $this->mysqli->query($sql);

		if(!$result) {
			throw new Exception($this->mysqli->error . $sql);
		}
		$this->result = $result;
		return $result;
	}
	
	private function convertResultToArray($sql, $arrayType) {
		$resultArray = array();
		$singleResultRow;

		$result = $this->runSQL($sql);

		while($singleResultRow = $result->fetch_array($arrayType)) {
			foreach($singleResultRow as $column) {
				$column = stripslashes($column);
				if($column == 'NULL') {
					$column = null;
				}
			}
			array_push($resultArray, $singleResultRow);
		}
		
		return $resultArray;
	}

	public function getInsertId() {
		return $this->mysqli->insert_id;
	}

	public function getNumberOfRows() {
		return $this->result->num_rows;
	}

	public function getNumberOfAffectedRows() {
		return $this->mysqli->affected_rows;
	}

	public function  __destruct() {
		$this->mysqli->close();
	}

}






?>
