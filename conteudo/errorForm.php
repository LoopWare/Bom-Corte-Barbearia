<?php
require_once 'session.php';
error_reporting(0);

if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}

require_once '../classes/Agendamento.class.php';
include_once '../classes/Usuario.class.php';
use classes\Agendamento;
use classes\Usuario;

if (!$_POST) {
    header("Location:../");
} else {
    $idUsuario = $_SESSION["idUsuario"];
    
    $usuario0 = new Usuario($idUsuario, "", "", "", "", "", "", "");
    $resultSet = $usuario0->read();
    
    $linha = mysqli_fetch_assoc($resultSet);
    
    if( $linha['idTipoUsuario'] != "4" && $linha['idTipoUsuario'] != "5" ){
        header("Location:../");
    }
    
    $id = $_POST["id"];
    
    $agendamento0 = new Agendamento($id, "", "", "", "", "", "", "", "");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC Erro no formulário </title>
    </head>

    <body>
    	<div id="img">
        	</br>
        	<a style="text-decoration: none;"><img id="logo" src="logo.jpg" class="img-circle" Alt="logo" title="BomCorte"></a>
        </div>
        <div id="ajuste">
        	<div class="LogContainer">
            <div class="cad">
                <label id="msgRec" aria-hidden="true"> Por favor, coloque corretamente os campos do Formulário </label>
                <a href="../"><img id="seta" src="../Imagens/seta/arrow.png" Alt="Seta para voltar" title="Seta para voltar"></a>
            </div>

        </div>
        </div>
    </body>
</html>