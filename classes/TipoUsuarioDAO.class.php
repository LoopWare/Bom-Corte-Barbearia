<?php

namespace classes;

use database\DBQuery;

require_once '../database/DBQuery.class.php';
require_once '../classes/TipoUsuario.class.php';

class TipoUsuarioDAO{
    
    private  $dbQuery;
    
    function __construct() {
        
        $tableName  = "bomcorte.tipoUsuarios";
        $fields     = "idTipoUsuario, TipoUsuario";
        $keyField   = "idTipoUsuario";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( TipoUsuario $tipoUsuario ){
        $this->dbQuery->insert( $tipoUsuario->toArray() );
    }
    
    public function read( TipoUsuario $tipoUsuario ){
        return ( $this->dbQuery->selectByField( "idTipoUsuario", $tipoUsuario->getIdTipoUsuario() ));
    }
    
    public function update( TipoUsuario $tipoUsuario ){
        $this->dbQuery->update( $tipoUsuario->toArray() );
    }
    
    public function delete( TipoUsuario $tipoUsuario ){
        $this->dbQuery->delete($tipoUsuario->getIdTipoUsuario());
    }
    
    public function listAll (){
        return ( $this->dbQuery->select("") );
    }
}

?>