<?php

namespace classes;

use database\DBQuery;

require_once '../database/DBQuery.class.php';
require_once '../classes/Agendamento.class.php';

class AgendamentoDAO {
    
    private  $dbQuery;
    
    function __construct() {
        
        $tableName  = "bomcorte.agendamento";
        $fields     = "idAgendamento, nome, cpf, data, idCorte, barbeiro, descricao, horario, idUsuario";
        $keyField   = "idAgendamento";
        
        $this->dbQuery = new DBQuery($tableName, $fields, $keyField);
    }
    
    public function create( Agendamento $agendamento ){
        return($this->dbQuery->insert( $agendamento->toArray() ) > 0);
        
    }
    
    public function listByField( $field, $value ) {
        return(  $this->dbQuery->selectByField($field, $value) );
    }
    
    public function update( Agendamento $agendamento ){
        return ($this->dbQuery->update( $agendamento->toArray() ) > 0);
    }
    
    public function delete( Agendamento $agendamento ){
        return ($this->dbQuery->delete($agendamento->getIdAgendamento()) > 0);
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