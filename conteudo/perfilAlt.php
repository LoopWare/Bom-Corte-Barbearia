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

?>
<script>
	function VerificacaoAlt(){
				
    var name= alteracao.name.value;
    var telefone= alteracao.telefone.value;
    
    if (name.length <3) {
        alert("Preencha seu nome, com no mínimo 3 letras");
        alteracao.name.focus()
        return false;
	}
				
    if (telefone.length <= 13 || telefone.length >= 15) {
    	alert("Preencha seu telefone com 14 digitos!");
    	alteracao.telefone.focus()
    	return false;
    }
}
</script>
<a style="display: inline-block;" href="#" onclick="$('#ajust').load('conteudo/perfilNorm.php');"> <img src="Imagens/opc/arrow.png" class="img-circle" Alt="voltar" title="Voltar"> <br> <p> Voltar </p> </a>
<br>
<div id="infoAlt">
	<form name="alteracao" id="formAlt" method="post" action="conteudo/alterar.php" enctype="multipart/form-data">
    	<br>
        <h4 class="titulo">Nome:</h4> 			<input onchange="VerificacaoAlt(this.value)" class="formInput" type="text" name="name" required value="<?php echo $linha["nome"]  ?>" placeholder="Nome Completo">
        <br>
        <h4 class="titulo">Telefone:</h4> 		<input onchange="VerificacaoAlt(this.value)" class="formInput" type="tel" name="telefone" pattern="+[0-9]{13}" maxlength='14' required value="<?php echo $linha["telefone"] ?>" placeholder="+9999999999999">
        <br>
<!--         <h4 class="titulo"> Foto: </h4>			<label class="formInput" label id="men"> <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1"> </label>
        <br> -->
        <input id="butMud" type="submit" value="Mudar!"> 
        <input id="butMud" type="reset" value="Redefinir!">
        <br>
    </form>
</div>
<br>
<br>