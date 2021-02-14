<?php

namespace classes;

use database\DBQuery;

require_once '../database/DBQuery.class.php';
require_once '../classes/Produtos.class.php';

class ProdutosDAO {
    
    private $dbQuery;
    
    function __construct() {
        
        $tableName  = "bomcorte.produtos";
        $fields     = "idProduto, nome, preco, marca, fabricante, modelo, idCategoria, dtFabricacao, validade, descricao, unidades";
        $keyField   = "idProduto";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( Produtos $produto ){
        $this->dbQuery->insert( $produto->toArray() );
    }
    
    public function read( Produtos $produto ){
        return ( $this->dbQuery->selectByField( "idProduto", $produto->getIdProduto() ));
    }
    
    public function update( Produtos $produto ){
        $this->dbQuery->update( $produto->toArray() );
    }
    
    public function delete( Produtos $produto ){
        $this->dbQuery->delete($produto->getIdProduto());
    }
    
    public function listAll (){
        return ( $this->dbQuery->select("") );
    }
    
    
    public function getDbQuery(){
        return $this->dbQuery;
    }
    
    public function setDbQuery($dbQuery){
        $this->dbQuery = $dbQuery;
        return $this;
    }
    
}

?>