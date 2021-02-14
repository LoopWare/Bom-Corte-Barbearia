<?php

namespace classes;

use database\DBQuery;

require_once '../database/DBQuery.class.php';
require_once '../classes/Usuario.class.php';

class UsuarioDAO {
    
    private $dbQuery;
    
    function __construct() {
        
        $tableName  = "bomcorte.usuario";
        $fields     = "idUsuario,nome,email,senha,telefone,cpf,foto,idTipoUsuario";
        $keyField   = "idUsuario";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( Usuario $usuario ){
        return ($this->dbQuery->insert( $usuario->toArray() ) > 0);
    }
    
    public function select( $where ){
        return ( $this->dbQuery->select($where) );
    }
    
    public function listByField( $field, $value ) {
        return(  $this->dbQuery->selectByField($field, $value) );
    }
    
    public function update( Usuario $usuario ){
        return ($this->dbQuery->update( $usuario->toArray() ) > 0);
    }
    
    public function delete( Usuario $usuario ){
        return ($this->dbQuery->delete($usuario->getIdUsuario()) > 0);
    }
    
    public function listAll (){
        return ( $this->dbQuery->select("") );
    }
    
    
    
    
    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
        return $this;
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