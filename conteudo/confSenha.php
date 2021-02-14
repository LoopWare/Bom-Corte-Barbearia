<?php
error_reporting(0);
if(!isset($_POST)){
    header("Location:recSenha.php");
}
if (!$_POST) {
    header("Location:../");
} else {
    $cpf = $_POST["cpf"];
}


?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title>BC Nova Senha</title>
    </head>

    <body>
    <script>
			function VerificacaoConf(){
				var pass= confSenha.pass.value;
				var confPass= confSenha.confPass.value;
				
				if (pass.length <6) {
					confSenha.action = "errorForm.php";
    				alert("Coloque uma senha de no mínimo 6 caracteres!");
    				confSenha.pass.focus()
    				return false;
				} else {
        			confSenha.action = "senha.php";
        		}
				if (confPass.length <6) {
					confSenha.action = "errorForm.php";
    				alert("Confirme sua senha!");
    				confSenha.confPass.focus()
    				return false;
				} else {
        			confSenha.action = "senha.php";
        		}
				if (pass != confPass) {
					confSenha.action = "errorForm.php";
    				alert("As senhas estão diferentes!");
    				confSenha.senha.focus()
    				return false;
				} else {
        			confSenha.action = "senha.php";
        		}
			}
		</script>
    	<div id="img">
        	</br>
        	<a style="text-decoration: none;" href="../"><img id="logo" src="logo.jpg" class="img-circle" Alt="logo" title="BomCorte"></a>
        </div>
        <div id="ajuste">
        	<div class="LogContainer2">
            <div class="cad">
            	<form name="confSenha" id="formRecSenha" action="senha.php" method="post">
                	<label style="margin: 30;" id="msgRec" aria-hidden="true"> Digite sua nova senha</label>
                	<input style="visibility: hidden; opacity: 0; width: 0; height: 0; margin: 0; padding: 0;" type="text" name="cpf" value="<?php echo"$cpf" ?>">
                    <input onchange="VerificacaoConf(this.value)" type="password" name="pass" required placeholder="Nova Senha">
                    <input onchange="VerificacaoConf(this.value)" type="password" name="confPass" required placeholder="Confirme a Nova Senha">
                    <input id="envioRecSenha" type="submit" value="Confirmar">
                </form>
            </div>

        </div>
        </div>
    </body>
</html>