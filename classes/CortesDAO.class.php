<?php

namespace classes;

use database\DBQuery;

require_once '../database/DBQuery.class.php';
require_once '../classes/Cortes.class.php';

class CortesDAO{
    
    private $dbQuery;
    
    function __construct(){
        
        $tableName  = "bomcorte.cortes";
        $fields     = "idCorte, nome, preco, preco2, idCategoria";
        $keyField   = "idCorte";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( Cortes $corte ){
        $this->dbQuery->insert( $corte->toArray() );
    }
    
    public function listByField( $field, $value ) {
        return(  $this->dbQuery->selectByField($field, $value) );
    }
    
    public function update( Cortes $corte ){
        $this->dbQuery->update( $corte->toArray() );
    }
    
    public function delete( Cortes $corte ){
        $this->dbQuery->delete($corte->getIdCorte());
    }
    
    public function listAll (){
        return ( $this->dbQuery->select("") );
    }
}

?>