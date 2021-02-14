<?php 
require_once 'session.php';
?>
<div class="PgAgenda">

    <h1 class="titulo" style="margin-left:30%;margin-right:30%;">Venha Agendar seu Corte</h1>

<img src="Imagens/agendamento/maquina.jpg" width="100px" height="100px" style="border-radius: 30%;">
<img src="Imagens/agendamento/tesoura.jpg" width="100px" height="100px" style="border-radius: 30%;">
<img src="Imagens/agendamento/navalha.jpg" width="100px" height="100px" style="border-radius: 30%;">
</br>

<?php 
if(isset($_SESSION["idUsuario"])):
?>
    <!-- Agendar no onclick -->
	<a onclick="$('#body').load('conteudo/agendamento2.php');" id="btn2">  Agendar </a>
<?php 
endif;
if(!isset($_SESSION["idUsuario"])  || $_SESSION["idUsuario"] == "0"):
?>
	<a href="conteudo/login.php" id="btn2">  Agendar </a>
<?php 
endif;
?>

</div>
