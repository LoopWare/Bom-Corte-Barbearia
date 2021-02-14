<?php
namespace conteudo;
error_reporting(0);

require_once 'session.php';

include_once '../classes/Usuario.class.php';
use classes\Usuario;

if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}
if (!$_POST) {
    header("Location:../");
} else {
    $idUsuario = $_SESSION["idUsuario"];
    
    $nome = $_POST['name'];
    $telefone = $_POST['telefone'];
    
    $usuario0 = new Usuario($idUsuario, "", "", "", "", "", "", "");
    $resultSet = $usuario0->read();
    
    $linha = mysqli_fetch_assoc($resultSet);
    
    $usuarioAlt = new Usuario($idUsuario, $nome, $linha["email"], $linha["senha"], $telefone, $linha["cpf"], "0", $linha["idTipoUsuario"]);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title>BC Alteração no perfil</title>
    </head>

    <body>
    	<div id="img">
        	</br>
        	<img id="logo" src="logo.jpg" class="img-circle" Alt="logo" title="BomCorte">
        </div>
        <div id="ajuste">
        	<div class="LogContainer">
            <div class="cad">
            	<?php
                	if (!$usuarioAlt->save()) {
                	    echo "<label id='msgRec' aria-hidden='true'> Alteração realizada com sucesso </label>";
                	} else {
                	    echo "<label id='msgRec' aria-hidden='true'> Falha ao realizar as Alterações </label>";
                	}
                ?>
                <a href="../"><img id="seta" src="../Imagens/seta/arrow.png" Alt="Seta para voltar" title="Seta para voltar"></a>
            </div>

        </div>
        </div>
    </body>
</html>