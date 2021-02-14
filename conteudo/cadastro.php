<?php
error_reporting(0);

use classes\Usuario;
include_once '../classes/Usuario.class.php';

if (!$_POST) {
    header("Location:../");
} else {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['pass'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    /* $foto = $_FILES['foto'] ?? NULL; */
    
    /* if ($senha != $confSenha){
     echo  "<script>alert('Senhas diferentes!);</script>";
     header("Location:login.php");
     } else {
     if (!empty($foto['name'])) {
     
     // Tamanho máximo do arquivo em bytes
     $tamanho = 1000;
     
     $error = array();
     // Verifica se o arquivo é uma imagem
     if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     $error[1] = "Isso não é uma imagem.";
     }
     
     // Verifica se o tamanho da imagem é maior que o tamanho permitido
     if($foto["size"] > $tamanho) {
     $error[2] = "A imagem deve ter no máximo ".$tamanho." bytes";
     }
     // Se não houver nenhum erro
     if (count($error) == 0) {
     
     // Pega extensão da imagem
     preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
     // Gera um nome único para a imagem
     $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
     // Caminho de onde ficará a imagem
     $caminho_imagem = "../../imagens/fotos/" . $nome_imagem;
     // Faz o upload da imagem para seu respectivo caminho
     move_uploaded_file($foto["tmp_name"], $caminho_imagem);
     
     } else {
     // Se houver mensagens de erro, exibe-as
     if (count($error) != 0) {
     foreach ($error as $erro) {
     echo $erro . "<br />";
     }
     }
     }
     }
     }
     */
    
    $usuario0 = new Usuario("0", $nome, $email, $senha, $telefone, $cpf, "0", "1");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="recSenha_confSenha.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC Cadastro </title>
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
            	if (!$usuario0->save()){
                    echo "<label id='msgRec' aria-hidden='true'> Cadastro realizado com sucesso </label>";
                    echo "<a href='login.php'><img id='seta' src='../Imagens/seta/arrow.png' Alt='Seta para voltar' title='Seta para voltar'></a>";
            	}else {
            	    echo "<label id='msgRec' aria-hidden='true'> Falha ao realizar o Cadastro </label>";
            	    echo "<img id='seta' src='../Imagens/seta/arrow.png' onclick='history.go(-1)' Alt='Seta para voltar' title='Seta para voltar'>";
            	}
                ?>
            </div>

        </div>
        </div>
    </body>
</html>