<?php

namespace classes;

use classes\CortesDAO;
use database\DBQuery;

require_once '../classes/CortesDAO.class.php';
require_once '../database/DBQuery.class.php';

class Cortes{
    
    private $idCorte;
    private $nome;
    private $preco;
    private $preco2;
    private $idCategoria;
    
    private $cortesDAO;
    
    function __construct($idCorte, $nome, $preco, $preco2, $idCategoria){
        $this->idCorte     = $idCorte;
        $this->nome        = $nome;
        $this->preco       = $preco;
        $this->preco2      = $preco2;
        $this->idCategoria = $idCategoria;
        
        $this->cortesDAO = new CortesDAO();
    }
    
    public function toArray() {
        return (
            array(
                $this->getIdCorte(),
                $this->getNome(),
                $this->getPreco(),
                $this->getPreco2(),
                $this->getIdCategoria()
            )
        );
    }
    
    public function save(){
        if( $this->getIdCorte() == 0){
            $this->cortesDAO->create($this);
        }else {
            $this->cortesDAO->update($this);
        }
    }
    
    public function read(){
        if ( $this->getIdCorte() > 0 ){
            return(  $this->cortesDAO->listByField('idCorte', $this->getIdCorte()));
        }
    }
    
    public function delete(){
        return($this->cortesDAO->delete($this));
        $this->cortesDAO->delete($this);
    }
    
    public function listAll(){
        return ($this->cortesDAO->listAll());
    }
    public function listAllJSon(){
        $rs     = $this->cortesDAO->listAll();
        $lines  = array();
        while($line = mysqli_fetch_assoc($rs)) {
            $lines[] = $line;
        }
        print (json_encode($lines));
    }

    
    
    public function getIdCorte(){
        return $this->idCorte;
    }

    public function setIdCorte($idCorte){
        $this->idCorte = $idCorte;
        return $this;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco){
        $this->preco = $preco;
        return $this;
    }
    
    public function getPreco2(){
        return $this->preco2;
    }
    
    public function setPreco2($preco2){
        $this->preco2 = $preco2;
        return $this;
    }

    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
        return $this;
    }

}

?>