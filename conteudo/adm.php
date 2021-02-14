<?php
require_once 'session.php';
error_reporting(0);
if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}

include_once '../classes/Usuario.class.php';
use classes\Usuario;

$idUsuario = $_SESSION["idUsuario"];

$usuario0 = new Usuario($idUsuario, "", "", "", "", "", "", "");
$resultSet = $usuario0->read();

$linha = mysqli_fetch_assoc($resultSet);

if( $linha['idTipoUsuario'] != "4" && $linha['idTipoUsuario'] != "5" ){
    header("Location:../");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="crud.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC ADM</title>
    </head>

    <body>
        <div id="perfil">
        	<div id="infoPerfil">
        		<h3>
            		<?php 
            		echo $linha["email"];
            		?>
        		</h3>
        		<br>
        		<div id="ajust">
        			<div id="linkPerf">
            			<a style="margin-right:20px;" href="../"> <img src="../Imagens/opc/arrow.png" class="img-circle" Alt="voltar" title="Voltar"> <br> <p class="pfirst"> Voltar </p> </a>
                		<br>
        			</div>
                    <div id="infoAltCrud">
                        <div id="link"> 
                        	<a style="float:left; margin-right:94px; padding:5px;" href="create.php"> 
                        		<img src="../Imagens/opc/create.png" class="img-circle" Alt="criar" title="Criar"> 
                        		<br> 
                        		<p style="margin-bottom: 0px;"> Criar </p> 
                        	</a>
                        	<a style="float:left; margin-right:0px; padding:5px;" href="read.php"> 
                        		<img src="../Imagens/opc/read.png" class="img-circle" Alt="buscar" title="Buscar"> 
                        		<br> 
                        		<p style="margin-bottom: 0px;"> Buscar </p> 
                        	</a>
                        	<br>
                        	<br>
                        	<br>
                        	<br>
                        	<br>
                        	<br>
                        	<br>
                        	<br>
                        	<a style="float:left; margin-right:94px; padding:5px;" href="update.php"> 
                        		<img src="../Imagens/opc/upgrade.png" class="img-circle" Alt="atualizar" title="Atualizar"> 
                        		<br> 
                        		<p style="margin-bottom: 0px;"> Atualizar </p> 
                        	</a>
                        	<a style="float:left; margin-right:0px; padding:5px;" href="delete.php"> 
                        		<img src="../Imagens/opc/delete.png" class="img-circle" Alt="deletar" title="Deletar"> 
                        		<br> 
                        		<p style="margin-bottom: 0px;"> Deletar </p> 
                        	</a>
                    	</div>
                    </div>
        		</div>
        	</div>
        </div>
    </body>
</html>

