<?php
require_once 'session.php';
include_once '../classes/Usuario.class.php';
use classes\Usuario;

$idUsuario = $_SESSION["idUsuario"];

if ( $idUsuario == "" ){
    header("Location:../");
}

$usuario0 = new Usuario($idUsuario, "", "", "", "", "", "", "");
$resultSet = $usuario0->read();

$linha = mysqli_fetch_assoc($resultSet);

$tipoUser = $linha["idTipoUsuario"];

?>
<a style="display: inline-block;" href="#" onclick="$('#ajust').load('conteudo/perfilAlt.php');"> <img src="Imagens/opc/gear.png" class="img-circle" Alt="alterar" title="Alterar"> <br> <p> Alterar </p> </a>
<br>
<?php 
if( $linha['idTipoUsuario'] == "4" || $linha['idTipoUsuario'] == "5" ):
?>
	<a style="display: inline-block; width: 48px;" href="conteudo/adm.php"> 
    	<img src="Imagens/opc/file.png" class="img-circle" Alt="adm" title="Adm"> 
    	<br> 
    	<p> ADM </p> 
	</a>
<?php 
endif;
?>
<div id="infoAlt">
    <br>
	<h4 class="titulo">Nome:</h4> 			<p> <?php echo $linha["nome"] ?> </p>
	<br>
	<h4 class="titulo">Telefone:</h4> 		<p> <?php echo $linha["telefone"] ?> </p>
	<br>
	<h4 class="titulo">CPF:</h4> 			<p> <?php echo $linha["cpf"] ?> </p>
	<br>
</div>
<br>
<a id="btnSair" href="conteudo/sair.php"> Sair </a>