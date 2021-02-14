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
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <link rel="shortcut icon" href="logo.jpg" />
        <title>BC Recuperação de Senha</title>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

    <body>
    <script>
		function VerificacaoConf(){
				var email= envioEmail.recEmail.value;
				var cpf= envioEmail.recCPF.value;
				
				if (email.length <11) {
    				alert("Preencha o seu Email corretamente!");
    				envioEmail.email.focus()
    				return false;
				}
				
				if (cpf.length <= 10 || cpf.length >= 12) {
    				alert("Preencha seu Cpf corretamente, com 11 digitos");
    				envioEmail.cpf.focus()
    				return false;
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
            	<form name="envioEmail" id="formRecSenha">
                	<label id="msgRec" aria-hidden="true"> Digite seus dados</label>
                    <input type="text" name="recEmail" required placeholder="Email">
                    <input onchange="VerificacaoConf(this.value)" type="text" name="recCPF" required placeholder="CPF">
                    <input id="envioRecSenha" type="submit" value="Enviar Email"> 
                </form>
                <img id="seta" src="../Imagens/seta/arrow.png" onclick="history.go(-1)" Alt="Seta para voltar" title="Seta para voltar">
            </div>
        	</div>
        </div>
        
    	<script type="text/javascript">
        	$(document).ready(function() {
        		$("#envioRecSenha").click(function(){
        			var dataForm = $('#formRecSenha').serialize();
        			alert( dataForm );
        			$.post( "phpmailer/mailer.php", dataForm, function ( data, status ){
        				alert( data );
        			}).done(function() {
        				//alert( "second success" );
        			}).fail(function() {
        				alert( "error" );
        			}).always(function() {
        			
        			});
        		});
        	});
    	</script>
    </body>
</html>