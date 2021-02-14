<?php

namespace classes;

use database\DBQuery;

require_once '../classes/CategoriasDAO.class.php';
require_once '../database/DBQuery.class.php';

class Categorias{
    
    private $idCategoria;
    private $descricao;
    
    private $categoriasDAO;
    
    function __construct($idCategoria, $descricao){
        $this->idCategoria     = $idCategoria;
        $this->descricao        = $descricao;
        
        $this->categoriasDAO = new CategoriasDAO();
    }
    
    public function toArray() {
        return (
            array(
                $this->getIdCategoria(),
                $this->getDescricao(),
            )
            );
    }
    
    public function save(){
        if( $this->getIdCategoria() == 0){
            $this->categoriasDAO->create($this);
        }else {
            $this->categoriasDAO->update($this);
        }
    }
    
    public function read(){
        if ( $this->getIdCategoria() > 0 ){
            return(  $this->categoriasDAO->listByField('idCategoria', $this->getIdCategoria()));
        }
    }
    
    public function delete(){
        return($this->categoriasDAO->delete($this));
        $this->categoriasDAO->delete($this);
    }
    
    public function listAll(){
        return ($this->categoriasDAO->listAll());
    }
    public function listAllJSon(){
        $rs     = $this->categoriasDAO->listAll();
        $lines  = array();
        while($line = mysqli_fetch_assoc($rs)) {
            $lines[] = $line;
        }
        print (json_encode($lines));
    }
    
    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
        return $this;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

    public function getCategoriasDAO(){
        return $this->categoriasDAO;
    }

    public function setCategoriasDAO($categoriasDAO){
        $this->categoriasDAO = $categoriasDAO;
        return $this;
    }

}

    
    
?>
    