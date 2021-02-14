<?php
namespace database;

require_once '../database/DBConnection.class.php';

class DBQuery {
	
	private $tableName; 
	private $fields;
	private $fields2;
	private $keyField;
	
	public function __construct($tableName, $fields, $keyField) {
		$this->setTableName		($tableName);
		$this->setFields		($fields);
		$this->setKeyField		($keyField);
	}

	public function select($where) {
		$sql = "";
		$sql .= " SELECT "	. implode(", ", $this->getFields());
		$sql .= " FROM "	. $this->getTableName();
		$sql .= (($where!="")?(" WHERE ".$where):"");

		$dbConnection = new DBConnection();
		$resultSet = $dbConnection->query($sql);
		return ($resultSet);
	}
	
	public function selectByKey($keyValue) {
	    $sql = "";
	    $sql .= " SELECT "	. implode(", ", $this->getFields());
	    $sql .= " FROM "	. $this->getTableName();
	    $sql .= " WHERE ".$this->getKeyField()." = ".$keyValue ;
	    
	    $dbConnection = new DBConnection();
	    $resultSet = $dbConnection->query($sql);
	    return ($resultSet);
	}
	
	public function selectByField($field, $value) {
	    $sql = "";
	    $sql .= " SELECT "	. implode(", ", $this->getFields());
	    $sql .= " FROM "	. $this->getTableName();
	    
	    if (is_numeric($value)){
	        $sql .= " WHERE ".$field." = ".$value ;
	    } else{
	        if (gettype($value) == "string"){
	            $sql .= " WHERE ".$field." = '".$value."'" ;
	        } else {
	            return( null );
	        }
	    }
	    $dbConnection = new DBConnection();
	    $resultSet = $dbConnection->query($sql);
	    return ($resultSet);
	}
	
	public function selectlimit($where, $limit, $limit2) {
		$sql = "";
		$sql .= " SELECT "	. implode(", ", $this->getFields());
		$sql .= " FROM "	. $this->getTableName();
		$sql .= (($where!="")?(" WHERE ".$where):"");
		$sql .= " LIMIT ".$limit. "," .$limit2 ;
		
		
		$dbConnection = new DBConnection();
		$resultSet = $dbConnection->query($sql);
		return ($resultSet);
	}
	
	function insert($values) {
	    $values = $this->clearArraySQLInjection($values);
		$sql  = "";
		$sql .= "  INSERT INTO ". $this->getTableName();
		$sql .= " ( ". implode(", ", $this->getFields()).")";
		$sql .= " VALUES ('". implode("','", $values) ."')";
		$dbConnection = new DBConnection();
		$returnOK = $dbConnection->query($sql);
		return ($returnOK);
	}	
	
	function delete($keyValue) {
	    $keyValue = $this->clearSQLInjection($keyValue);
	    
		if($keyValue!=""){
			$sql = " DELETE FROM ". $this->getTableName();
			$sql .=" WHERE ".$this->keyField."= '".$keyValue."'";
			$dbConnection = new DBConnection();
			$returnOK = $dbConnection->query($sql);
			return ( $returnOK );
		}else{
			return (0);
		}
	}

	function deleteWhere($where) {
	
		if($where!=""){
			$sql = " DELETE FROM ". $this->getTableName();
			$sql .=" WHERE ". $where;
			$dbConnection = new DBConnection();
			$returnOK = $dbConnection->query($sql);
			return ($returnOK);
		}else{
			return (0);
		}
	}
	
	function update($values) {
	    $values = $this->clearArraySQLInjection($values);
		$qtd = count($values);
		$arrayFields = $this->getFields();
		
		$sql  = " UPDATE ". $this->getTableName();
		$sql .= " SET ";
		for($i=1; $i<$qtd; $i++){
			$sql .= " ".$arrayFields[$i]."= '".$values[$i]."' ";
			$sql .=  ($i==$qtd-1)?" ":",";
		}
		$sql .=" WHERE ".$this->getKeyField()."= '".$values[0]."'";
		
		$dbConnection = new DBConnection();
		$returnOK = $dbConnection->query($sql);
		return ($returnOK);
	}
	
	function updateWhere($values, $where) {
	    $values = $this->clearArraySQLInjection($values);
		$qtd = count($values);
		$arrayFields = $this->getFields();
	
		$sql  = " UPDATE ". $this->getTableName();
		$sql .= " SET ";
		for($i=1; $i<$qtd; $i++){   // $i++ == $i=$i+1
			$sql .= " ".$arrayFields[$i]."= '".$values[$i]."' ";
			$sql .=  ($i==$qtd-1)?" ":",";
		}
		$sql .=" WHERE ". $where;
	
		$dbConnection = new DBConnection();
		if ($where != "")
			$returnOK = $dbConnection->query($sql);
		else 
			$returnOK = false;
		return ($returnOK);
	}
	
	function update2($values) {
	    $values = $this->clearArraySQLInjection($values);
		$qtd = count($values);
		$arrayFields = $this->getFields2();
		
		$sql  = " UPDATE ". $this->getTableName();
		$sql .= " SET ";
		for($i=1; $i<$qtd; $i++){   // $i++ == $i=$i+1
			$sql .= " ".$arrayFields[$i]."= '".$values[$i]."' ";
			$sql .=  ($i==$qtd-1)?" ":",";
		}
		$sql .=" WHERE ".$this->getKeyField()."= '".$values[0]."'";
		
		$dbConnection = new DBConnection();
		$resultSet = $dbConnection->query($sql);
		return ($resultSet);
	}
	
	public function clearArraySQLInjection($values) {
	    for ($i = 0; $i < count($values); $i++) {
	        $values[$i] = str_replace("'","`",str_replace("\"","``",$values[$i]));
	    }
	    return ($values);
	}
	
	public function clearSQLInjection($value) {
	    return (str_replace("'","`",str_replace("\"","``",$value)));
	}
	
	
	
	
	
    public function getTableName(){
        return $this->tableName;
    }

    public function setTableName($tableName){
        $this->tableName = $tableName;
    }

    public function getFields(){
        return $this->fields;
    }

    public function setFields($fields){
    	$fields = str_replace(" ", "", $fields);
    	$arrayFields = explode(",", $fields);
        $this->fields = $arrayFields;
    }
    
    public function getFields2(){
        return $this->fields2;
    }

    public function setFields2($fields2){
    	$fields2 = str_replace(" ", "", $fields2);
    	$arrayFields = explode(",", $fields2);
        $this->fields2 = $arrayFields;
    }

    public function getKeyField(){
        return $this->keyField;
    }

    public function setKeyField($keyField){
        $this->keyField = $keyField;
    }
	
    public function getDbConnection(){
    	$dbConnection = new DBConnection();
    	return ($dbConnection);
    }

}

?>