<?php
require_once 'session.php';
error_reporting(0);

if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}

require_once '../database/DBQuery.class.php';
require_once '../classes/Agendamento.class.php';
require_once '../classes/Usuario.class.php';
use classes\Usuario;
use classes\Agendamento;
use database\DBQuery;

$usuario0 = new Usuario($_SESSION["idUsuario"], "", "", "", "", "", "", "");
$resultSet = $usuario0->read();

$linha = mysqli_fetch_assoc($resultSet);

if( $linha['idTipoUsuario'] != "4" && $linha['idTipoUsuario'] != "5" ){
    header("Location:../");
}

if (!$_POST) {
    header("Location:../");
} else {
    $cpf = $_POST["cpf"];
    $usuario1 = new Usuario("", "", "", "", "", $cpf, "", "");
    $resultSet2 = $usuario1->readCpf();
    
    $linha2 = mysqli_fetch_assoc($resultSet2);
    
    $id = $linha2["idUsuario"];
    $nome = $linha2["nome"];
    $data = $_POST["data"];
    $idCorte = $_POST["idCorte"];
    $barbeiro = strtolower($_POST["barbeiro"]);
    $descricao = $_POST["descricao"];
    $horario = $_POST["hora"];
    
    $parteData = explode("/", $data);
    $dataInvertida = $parteData[2] ."-". $parteData[1] ."-". $parteData[0];
    $data = $dataInvertida;
    
    $tableName  = "view_agendamento";
    $fieldsName = "idAgendamento, nome, email, telefone, cpf, data, horario, barbeiro, descricao,corte, preco, preco2, categoria";
    $fieldKey   = "idAgendamento";
    
    $dbQuery   = new DBQuery($tableName, $fieldsName, $fieldKey);
    $resultSet3 = $dbQuery->select("");
    
    error_reporting(0);
    
    $fieldsItems= explode(",", str_replace(' ', '', $fieldsName));
    while ($lines = mysqli_fetch_assoc($resultSet3)) {
        if ($lines[$fieldsItems[7]] == $barbeiro && $lines[$fieldsItems[5]] == $data){
            if ($lines[$fieldsItems[6]] == $horario){
                $horario = "ℬℭ";
            }
        }
    }
    
    $agendamento0 = new Agendamento("0", $nome, $cpf, $data, $idCorte, $barbeiro, $descricao, $horario, $id);
}


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC ADM Criar </title>
    </head>

    <body>
    	<div id="img">
        	</br>
        	<a style="text-decoration: none;"><img id="logo" src="logo.jpg" class="img-circle" Alt="logo" title="BomCorte"></a>
        </div>
        <div id="ajuste">
        	<div class="LogContainer">
            <div class="cad">
            	<?php
            	if($horario != "ℬℭ"){
            	    if($agendamento0->save()){
            	        echo "<label id='msgRec' aria-hidden='true'> Agendamento realizado com sucesso </label>";
            	    }else {
            	        echo "<label id='msgRec' aria-hidden='true'> Falha ao realizar o Agendamento, tente novamente! </label>";
            	    }
            	} else {
            	    echo "<label id='msgRec' aria-hidden='true'> Falha ao realizar o Agendamento, tente novamente! </label>";
            	}
                ?>
                <a href="create.php"><img id="seta" src="../Imagens/seta/arrow.png" Alt="Seta para voltar" title="Seta para voltar"></a>
            </div>

        </div>
        </div>
    </body>
</html>