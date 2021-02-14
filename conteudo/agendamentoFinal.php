<?php
require_once 'session.php';
error_reporting(0);

use classes\Agendamento;
include_once '../classes/Agendamento.class.php';

if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}
if(!isset($_POST)){
    header("Location:agendamento.php");
}

if (!$_POST) {
    header("Location:../");
} else {
    $idUsuario = $_SESSION["idUsuario"];
    
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data = $_POST["data"];
    $idCorte = $_POST["corte"];
    $barbeiro = $_POST["barbeiro"];
    $descricao = $_POST["obs"];
    $horario = $_POST["hora"];
    
    $agendamento0 = new Agendamento("0", $nome, $cpf, $data, $idCorte, $barbeiro, $descricao, $horario, $idUsuario);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC Agendamento</title>
    </head>

    <body>
    	<div id="img">
        	</br>
        	<a style="text-decoration: none;"><img id="logo" src="logo.jpg" class="img-circle" Alt="logo" tilte="BomCorte"></a>
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
                <a href="../../bomcorte"><img id="seta" src="../Imagens/seta/arrow.png" Alt="Seta para voltar" title="Seta para voltar"></a>
            </div>

        </div>
        </div>
    </body>
</html>