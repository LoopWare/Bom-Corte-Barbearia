<?php

namespace classes;

use classes\TipoUsuarioDAO;
use database\DBQuery;

require_once '../classes/TipoUsuarioDAO.class.php';
require_once '../database/DBQuery.class.php';

class TipoUsuario{
    
    private $idTipoUsuario;
    private $tipoUsuario;
    
    private $tipoUsuarioDAO;
    
    function __construct($idTipoUsuario, $tipoUsuario){
        $this->idTipoUsuario = $idTipoUsuario;
        $this->tipoUsuario   = $tipoUsuario;
        
        $this->tipoUsuarioDAO = new TipoUsuarioDAO();
    }
    
    public function toArray(){
        return(
            array(
                $this->getIdTipoUsuario(),
                $this->getTipoUsuario()
            )
        );
    }
    

    public function getIdTipoUsuario(){
        return $this->idTipoUsuario;
    }

    public function setIdTipoUsuario($idTipoUsuario){
        $this->idTipoUsuario = $idTipoUsuario;
        return $this;
    }

    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
        return $this;
    }
    
    

    public function getTipoUsuarioDAO(){
        return $this->tipoUsuarioDAO;
    }

    public function setTipoUsuarioDAO($tipoUsuarioDAO){
        $this->tipoUsuarioDAO = $tipoUsuarioDAO;
        return $this;
    }

}



?>