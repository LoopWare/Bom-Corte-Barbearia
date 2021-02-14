<?php
error_reporting(0);

use classes\Usuario;
require '../classes/Usuario.class.php';
if ( isset($_POST)){
    $email =        $_POST['email'];
    $senha =        $_POST['password'];
}

if (!$_POST) {
    header("Location:../");
} else {
    $usuario = new Usuario(0, "", $email, $senha, "", "", "", "");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC Login </title>
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
            	if ($usuario->checkLogin()){
            	    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                    echo "<label id='msgRec' aria-hidden='true'> Login realizado com sucesso </label>";
                    echo "<a href='login.php'><img id='seta' src='../Imagens/seta/arrow.png' Alt='Seta para voltar' title='Seta para voltar'></a>";
            	}else {
            	    echo "<label id='msgRec' aria-hidden='true'> Falha ao realizar o Login </label>";
            	    echo "<img id='seta' src='../Imagens/seta/arrow.png' onclick='history.go(-1)' Alt='Seta para voltar' title='Seta para voltar'>";
            	}
                ?>
            </div>

        </div>
        </div>
    </body>
</html>