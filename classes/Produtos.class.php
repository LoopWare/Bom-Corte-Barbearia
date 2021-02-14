<?php

namespace classes;

use classes\ProdutosDAO;
use database\DBQuery;

require_once '../classes/ProdutosDAO.class.php';
require_once '../database/DBQuery.class.php';

class Produtos{
    
    private $idProduto;
    private $nome;
    private $preco;
    private $marca;
    private $fabricante;
    private $modelo;
    private $idCategoria;
    private $dtFabricacao;
    private $validade;
    private $descricao;
    private $unidades;
    
    private $produtosDAO;
    
    function __construct( $idProduto, $nome, $preco, $marca, $fabricante, $modelo, $idCategoria, $dtFabricacao, $validade, $descricao, $unidades){
        
        $this->idProduto = $idProduto;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->marca = $marca;
        $this->fabricante = $fabricante;
        $this->modelo = $modelo;
        $this->idCategoria = $idCategoria;
        $this->dtFabricacao = $dtFabricacao;
        $this->validade = $validade;
        $this->descricao = $descricao;
        $this->unidades = $unidades;
        
        $this->produtosDAO = new ProdutosDAO();
    }
    
    public function toArray() {
        return (
            array(
                $this->getIdProduto(),
                $this->getNome(),
                $this->getPreco(),
                $this->getMarca(),
                $this->getFabricante(),
                $this->getModelo(),
                $this->getIdCategoria(),
                $this->getDtFabricacao(),
                $this->getValidade(),
                $this->getDescricao(),
                $this->getUnidades()
            )
        );
    }
    
    public function save(){
        if( $this->getIdProduto() == 0){
            $this->produtosDAO->create($this);
        }else {
            $this->produtosDAO->update($this);
        }
    }
    
    public function read(){
        $this->produtosDAO->read($this);
    }
    
    public function delete(){
        $this->produtosDAO->delete($this);
    }
    
    public function listAll(){
        return ($this->produtosDAO->listAll());
    }
    public function listAllJSon(){
        $rs     = $this->produtosDAO->listAll();
        $lines  = array();
        while($line = mysqli_fetch_assoc($rs)) {
            $lines[] = $line;
        }
        print (json_encode($lines));
    }
    
    
    
    public function getIdProduto(){
        return $this->idProduto;
    }

    public function setIdProduto($idProduto){
        $this->idProduto = $idProduto;
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

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
        return $this;
    }

    public function getFabricante(){
        return $this->fabricante;
    }

    public function setFabricante($fabricante){
        $this->fabricante = $fabricante;
        return $this;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
        return $this;
    }

    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
        return $this;
    }

    public function getDtFabricacao(){
        return $this->dtFabricacao;
    }

    public function setDtFabricacao($dtFabricacao){
        $this->dtFabricacao = $dtFabricacao;
        return $this;
    }

    public function getValidade(){
        return $this->validade;
    }

    public function setValidade($validade){
        $this->validade = $validade;
        return $this;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

    public function getUnidades(){
        return $this->unidades;
    }

    public function setUnidades($unidades){
        $this->unidades = $unidades;
        return $this;
    }

    public function getProdutosDAO(){
        return $this->produtosDAO;
    }

    public function setProdutosDAO($produtosDAO){
        $this->produtosDAO = $produtosDAO;
        return $this;
    }
}

?>