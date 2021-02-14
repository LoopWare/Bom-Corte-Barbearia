<?php

namespace classes;

use classes\UsuarioDAO;
use database\DBQuery;

require_once '../classes/UsuarioDAO.class.php';
require_once '../database/DBQuery.class.php';

class Usuario{
    
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $cpf;
    private $foto;
    private $idTipoUsuario;
    
    private $usuarioDAO;
    
    
    function  __construct( $idUsuario, $nome, $email, $senha, $telefone, $cpf, $foto, $idTipoUsuario){
        $this->idUsuario        = $idUsuario;
        $this->nome             = $nome;
        $this->email            = $email;
        $this->senha            = $senha;
        $this->telefone         = $telefone;
        $this->cpf              = $cpf;
        $this->foto             = $foto;
        $this->idTipoUsuario    = $idTipoUsuario;
         
        $this->usuarioDAO = new UsuarioDAO();
    }
    
    
    public function toArray() {
        return (
            array(
                $this->getIdUsuario(),
                $this->getNome(),
                $this->getEmail(),
                $this->getSenha(),
                $this->getTelefone(),
                $this->getCpf(),
                $this->getFoto(),
                $this->getIdTipoUsuario()
            )
        );
    }

    public function save(){
        if( $this->getIdUsuario() == 0){
            $this->usuarioDAO->create($this);
        }else {
            $this->usuarioDAO->update($this);
        }
    }
    
    public function checkLogin(){
        $dbQuery = new DBQuery("", "", "");
        $this->email = $dbQuery->clearSQLInjection($this->email);
        $this->senha = $dbQuery->clearSQLInjection($this->senha);
        
        $resultSet =  $this->usuarioDAO->select(" email='".$this->email."' and senha='".$this->senha."'");
        $qtdLines  =  mysqli_num_rows($resultSet);
        
        $lines =  mysqli_fetch_assoc($resultSet);
        $idUsuario = $lines["idUsuario"];
        
        if ( $qtdLines > 0 ){
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();
            $_SESSION["idUsuario"] =  $idUsuario;
            return(true);
        }else{
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();
            unset($_SESSION["idUsuario"]);
            return(false);
        }
    }
    
    public function read(){
        if ( $this->getIdUsuario() > 0 ){
            return(  $this->usuarioDAO->listByField('idUsuario', $this->getIdUsuario()));
        }
    }
    
    public function readCpf(){
        if ( $this->getCpf() > 0 ){
            return(  $this->usuarioDAO->listByField('cpf', $this->getCpf()));
        }
    }
    
    public function readEmail(){
        if ( $this->getEmail() > 0 ){
            return(  $this->usuarioDAO->listByField('email', $this->getEmail()));
        }
    }
    
    public function delete(){
        $this->usuarioDAO->delete($this);
    }

    public function listAll(){
        return ($this->usuarioDAO->listAll());
    }
    public function listAllJSon(){
        $rs     = $this->usuarioDAO->listAll();
        $lines  = array();
        while($line = mysqli_fetch_assoc($rs)) {
            $lines[] = $line;
        }
        print (json_encode($lines));
    }
    
    
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
        return $this;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
        return $this;
    }
    
    public function getFoto(){
        return $this->foto;
    }
    
    public function setFoto($foto){
        $this->foto = $foto;
        return $this;
    }

    public function getIdTipoUsuario(){
        return $this->idTipoUsuario;
    }

    public function setIdTipoUsuario($idTipoUsuario){
        $this->idTipoUsuario = $idTipoUsuario;
        return $this;
    }

    public function getUsuarioDAO(){
        return $this->usuarioDAO;
    }

    public function setUsuarioDAO($usuarioDAO){
        $this->usuarioDAO = $usuarioDAO;
        return $this;
    }

}