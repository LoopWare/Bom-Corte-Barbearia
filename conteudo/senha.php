<?php
error_reporting(0);
if(!isset($_POST)){
    header("Location:recSenha.php");
}
if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}

use classes\Usuario;
include_once '../classes/Usuario.class.php';

if (!$_POST) {
    header("Location:../");
} else {
    $senha = $_POST["pass"];
    $cpf = $_POST["cpf"];
    
    echo $cpf;
    
    $usuario0 = new Usuario("", "", "", $cpf, "", "", "", "");
    $resultSet = $usuario0->readCpf();
    $linha = mysqli_fetch_assoc($resultSet);
    
    echo $linha["idUsuario"];
    echo $linha["nome"];
    echo $linha["email"];
    echo $linha["senha"];
    echo $linha["telefone"];
    echo $linha["cpf"];
    echo $linha["foto"];
    echo $linha["idTipoUsuario"];
    
    $usuario1 = new Usuario($linha["idUsuario"], $linha["nome"], $linha["email"], $senha, $linha["telefone"], $cpf, $linha["foto"], $linha["idTipoUsuario"]);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC Nova Senha </title>
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
            	if ($usuario1->save()){
                    echo "<label id='msgRec' aria-hidden='true'> Troca de senha realizada com Sucesso </label>";
                    echo "<a href='Login.php'><img id='seta' src='../Imagens/seta/arrow.png' Alt='Seta para voltar' title='Seta para voltar'></a>";
            	}else {
            	    echo "<label id='msgRec' aria-hidden='true'> Falha na Troca de senha, tente novamente! </label>";
            	    echo "<a href='Login.php'><img id='seta' src='../Imagens/seta/arrow.png' Alt='Seta para voltar' title='Seta para voltar'></a>";
            	}
                ?>
            </div>

        </div>
        </div>
    </body>
</html>