<?php

namespace classes;

use database\DBQuery;

require_once '../database/DBQuery.class.php';
require_once '../classes/Categorias.class.php';

class CategoriasDAO{
    
    private $dbQuery;
    
    function __construct(){
        
        $tableName  = "bomcorte.categorias";
        $fields     = "idCategoria, descricao";
        $keyField   = "idCategoria";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( Categorias $categoria ){
        $this->dbQuery->insert( $categoria->toArray() );
    }
    
    public function listByField( $field, $value ) {
        return(  $this->dbQuery->selectByField($field, $value) );
    }
    
    public function update( Categorias $categoria ){
        $this->dbQuery->update( $categoria->toArray() );
    }
    
    public function delete( Categorias $categoria ){
        $this->dbQuery->delete($categoria->getIdCorte());
    }
    
    public function listAll (){
        return ( $this->dbQuery->select("") );
    }
}

?>