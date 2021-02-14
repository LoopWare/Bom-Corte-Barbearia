<?php 
require_once 'session.php';
error_reporting(0);
if ( $_SESSION["idUsuario"] != "" ){
    header("Location:../");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="login.css" rel="stylesheet">
        <link rel="shortcut icon" href="logo.jpg" />
        <title>BC Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

    <body>
    <script>
			function VerificacaoCad(){
				
				var name= cadastro.name.value;
				var email= cadastro.email.value;
				var telefone= cadastro.telefone.value;
				var cpf= cadastro.cpf.value;
				var pass= cadastro.pass.value;
				var confPass= cadastro.confPass.value;
				
				if (name.length <3) {
					cadastro.action = "errorForm.php";
    				alert("Preencha seu nome, com no mínimo 3 letras");
    				cadastro.name.focus()
    				return false;
				} else {
        			cadastro.action = "cadastro.php";
        		}
				
				if (email.length <11) {
					cadastro.action = "errorForm.php";
    				alert("Preencha o seu Email corretamente!");
    				cadastro.email.focus()
    				return false;
				} else {
        			cadastro.action = "cadastro.php";
        		}
				
				if (pass.length <6) {
					cadastro.action = "errorForm.php";
    				alert("Coloque uma senha de no mínimo 6 caracteres!");
    				cadastro.pass.focus()
    				return false;
				} else {
        			cadastro.action = "cadastro.php";
        		}
				if (confPass.length <6) {
					cadastro.action = "errorForm.php";
    				alert("Confirme sua senha!");
    				cadastro.confPass.focus()
    				return false;
				} else {
        			cadastro.action = "cadastro.php";
        		}
				if (pass != confPass) {
					cadastro.action = "errorForm.php";
    				alert("As senhas estão diferentes!");
    				cadastro.senha.focus()
    				return false;
				} else {
        			cadastro.action = "cadastro.php";
        		}
				
				if (telefone.length <= 13 || telefone.length >= 15) {
					cadastro.action = "errorForm.php";
    				alert("Preencha seu telefone com 14 digitos!");
    				cadastro.telefone.focus()
    				return false;
				} else {
        			cadastro.action = "cadastro.php";
        		}
				
				if (cpf.length <= 10 || cpf.length >= 12) {
					cadastro.action = "errorForm.php";
    				alert("Preencha seu Cpf corretamente, com 11 digitos");
    				cadastro.cpf.focus()
    				return false;
				} else {
        			cadastro.action = "cadastro.php";
        		}
			}
			
			function VerificacaoLog(){
				
				var email= login.email.value;
				var pass= login.password.value;
				
				if (email.length <11) {
					login.action = "errorForm.php";
    				alert("Preencha o seu Email corretamente!");
    				login.email.focus()
    				return false;
				} else {
        			login.action = "checkLogin.php";
        		}
        		
        		if (pass.length <6) {
					login.action = "errorForm.php";
    				alert("Coloque uma senha de no mínimo 6 caracteres!");
    				login.pass.focus()
    				return false;
				} else {
        			login.action = "checkLogin.php";
        		}
			}
		</script>
    	<div id="img">
        	</br>
        	<a style="text-decoration: none;" href="../../bomcorte"><img id="logo" src="logo.jpg" class="img-circle" Alt="logo" title="BomCorte"></a>
        </div>
        <div id="ajuste">
        	<div class="LogContainer">
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="cad">
				<form name="cadastro" id="formCad" method="post" action="" enctype="multipart/form-data">
                	<label id="sta" for="chk" aria-hidden="true">Cadastre-se</label>
                	<div id="roll">
                    	<input onchange="VerificacaoCad(this.value)" type="text" name="name" required placeholder="Nome Completo"> 
                    	<input onchange="VerificacaoCad(this.value)" type="Email" name="email" required placeholder="Email"> 
                    	<input onchange="VerificacaoCad(this.value)" type="password" name="pass" required placeholder="Senha"> 
                    	<input onchange="VerificacaoCad(this.value)" type="password" name="confPass" required placeholder="Confirme a senha"> 
                    	<input onchange="VerificacaoCad(this.value)" type="tel" name="telefone" pattern="+[0-9]{13}" maxlength='14' required placeholder="+9999999999999">
                    	<p style="color: #FFAA00;"><small>Formato Exemplo: +5511999999999</small></p>
                    	<input onchange="VerificacaoCad(this.value)" type="text" name="cpf" maxlength='11' required placeholder="CPF">
                    	<p style="color: #FFAA00;"><small>Escreva o CPF tudo junto</small></p> 
                    	<!-- <label id="men">Adicione uma foto &#128513; </label>
                    		<input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1"> -->
                    	<input id="butCad" type="submit" value="Cadastrar"> 
                	</div>
                </form>
            </div>

            <div class="login">
                <form name="login" id="formLogin" method="post" action="">
                    <label for="chk" aria-hidden="true"> Login</label>
                    <input onchange="VerificacaoLog(this.value)" type="text" name="email" required placeholder="Email"> 
                    <input onchange="VerificacaoLog(this.value)" type="password" name="password" required placeholder="Senha"> 
                    <input id="butLogin" type="submit" value="Iniciar Sessão"> 
                </form>
            </div>

        </div>
        </div>
    </body>
</html>