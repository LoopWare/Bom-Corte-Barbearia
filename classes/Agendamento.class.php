<?php

namespace classes;

require_once '../classes/AgendamentoDAO.class.php';

class Agendamento{
    
    private $idAgendamento;
    private $nome;
    private $cpf;
    private $data;
    private $idCorte;
    private $barbeiro;
    private $descricao;
    private $horario;
    private $idUsuario;
    
    private $agendamentoDAO;
    
    function __construct($idAgendamento, $nome, $cpf, $data, $idCorte, $barbeiro, $descricao, $horario, $idUsuario){
        $this->idAgendamento    = $idAgendamento;
        $this->nome             = $nome;
        $this->cpf              = $cpf;
        $this->data             = $data;
        $this->idCorte          = $idCorte;
        $this->barbeiro         = $barbeiro;
        $this->descricao        = $descricao;
        $this->horario          = $horario;
        $this->idUsuario        = $idUsuario;
        
        $this->agendamentoDAO = new AgendamentoDAO();
    }
    
    public function toArray() {
        return (
            array(
                $this->getIdAgendamento(),
                $this->getNome(),
                $this->getCpf(),
                $this->getData(),
                $this->getIdCorte(),
                $this->getBarbeiro(),
                $this->getDescricao(),
                $this->getHorario(),
                $this->getIdUsuario()
            )
        );
    }
    
    public function save(){
        if( $this->getIdAgendamento() == 0){
            return($this->agendamentoDAO->create($this));
        }else {
            return($this->agendamentoDAO->update($this));
        }
    }
    
    public function read(){
        if ( $this->getIdAgendamento() > 0 ){
            return(  $this->agendamentoDAO->listByField('idAgendamento', $this->getIdAgendamento()));
        }
    }
    
    public function readEmail(){
        if ( $this->getEmail() > 0 ){
            return(  $this->agendamentoDAO->listByField('email', $this->getEmail()));
        }
    }
    
    public function delete(){
        return($this->agendamentoDAO->delete($this));
    }
    
    public function listAll(){
        return ($this->agendamentoDAO->listAll());
    }
    
    public function listAllJSon(){
        $rs     = $this->agendamentoDAO->listAll();
        $lines  = array();
        while($line = mysqli_fetch_assoc($rs)) {
            $lines[] = $line;
        }
        print (json_encode($lines));
    }
    
    
    
    
    
    
    public function getIdAgendamento(){
        return $this->idAgendamento;
    }
    
    public function setIdAgendamento($idAgendamento){
        $this->idAgendamento = $idAgendamento;
        return $this;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    
    public function setCpf($cpf){
        $this->cpf = $cpf;
        return $this;
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function setData($data){
        $this->data = $data;
        return $this;
    }
    
    public function getIdCorte(){
        return $this->idCorte;
    }
    
    public function setIdCorte($idCorte){
        $this->idCorte = $idCorte;
        return $this;
    }
    
    public function getBarbeiro(){
        return $this->barbeiro;
    }
    
    public function setBarbeiro($barbeiro){
        $this->barbeiro = $barbeiro;
        return $this;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }
    
    public function getHorario(){
        return $this->horario;
    }
    
    public function setHorario($horario){
        $this->horario = $horario;
        return $this;
    }
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }
    
    

    public function getAgendaDAO(){
        return $this->agendaDAO;
    }

    public function setAgendaDAO($agendaDAO){
        $this->agendaDAO = $agendaDAO;
        return $this;
    }

}

?>