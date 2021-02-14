<?php 
require_once 'session.php';
error_reporting(0);

include_once '../classes/Agendamento.class.php';
require_once '../database/DBQuery.class.php';
use classes\Agendamento;
use database\DBQuery;

if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}
if(!isset($_POST)){
    header("Location:agendamento.php");
}

if (!$_POST) {
    header("Location:../");
} else {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $barb = $_POST["barbeiro"];
    $serv = $_POST["corte"];
    $data = $_POST["data"];
    $obs = $_POST["obs"];
    
    $parteData = explode("/", $data);
    $dataInvertida = $parteData[2] ."-". $parteData[1] ."-". $parteData[0];
    $data = $dataInvertida;
    
    // Monta Corpo da Tabela
    $tableName  = "view_agendamento";
    $fieldsName = "idAgendamento, nome, email, telefone, cpf, data, horario, barbeiro, descricao,corte, preco, preco2, categoria";
    $fieldKey   = "idAgendamento";
    
    $dbQuery   = new DBQuery($tableName, $fieldsName, $fieldKey);
    $resultSet = $dbQuery->select("");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="agendamento.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC Agendamento </title>
    </head>

    <body>
    	<div id="aj">
			<a style="text-decoration: none;" href="../"><img id="seta" src="../Imagens/seta/arrow.png" Alt="Seta para voltar" title="Seta para voltar"></a>
		</div>
    	<p> Cancelar Agendamento </p>
        <div class="Horario"> 
            <div class="cardB">
                <div class="imgB">
                    <img src="../Imagens/barbeiros/douglas.png" width="400px" height="500px">
                </div>
                <div class="schedule">
                    <div class="botoes">
                        <h3 id="h3t">Horários</br>
                        <h5> <?php echo"&#8492;&#8493" ?> = indisponível </h5>
                        <span id="sban">Barbeiro: Douglas </span>
                        </h3>
        				<form name="agenda" method="post" action="agendamentoFinal.php">
        					<input class="stelf" name="nome" value="<?php echo"$nome"; ?>">
        					<input class="stelf" name="cpf" value="<?php echo"$cpf"; ?>">
        					<input class="stelf" name="barbeiro" value="<?php echo"$barb"; ?>">
        					<input class="stelf" name="corte" value="<?php echo"$serv"; ?>">
        					<input class="stelf" name="data" value="<?php echo"$data" ?>">
        					<input class="stelf" name="obs" value="<?php echo"$obs" ?>">
        					<?php 
        					$time = array(
                					    "09:00", "09:20", "09:40", "10:00", "10:20", "10:40", "11:00", "11:20", "11:40", "12:00", 
                					    "14:00", "14:20", "14:40", "15:00", "15:20", "15:40", "16:00", "16:20", "16:40", 
                					    "17:00", "17:20", "17:40", "18:00"
            					    );
        					echo "<ul id='ulh'>";
        					echo "<li>";
        					error_reporting(0);
        					
        					$fieldsItems= explode(",", str_replace(' ', '', $fieldsName));
        					while ($lines = mysqli_fetch_assoc($resultSet)) {
        					    if ($lines[$fieldsItems[7]] == "douglas" && $lines[$fieldsItems[5]] == $data){
        					        for($j=0; $j < count($time); $j++){
        					            if($lines[$fieldsItems[6]] == $time[$j]){
        					                $time[$j] = "&#8492;&#8493;";
        					            }
        					        }
        					    }
        					}
        					
        					for($f=0; $f < count($time); $f++){
        					    echo "<input class='Boton' name='hora' type='submit' value='".$time[$f]."'>";
        					    if($f == 5 || $f == 11 || $f == 17){
        					        
        					        echo "</li> </br>";
        					        echo "<li>";
        					    }
        					}
        					echo"</li>";
        					echo"</ul>";
        					?>
                    	</form>
                    </div>  
                </div>
            </div>
        </div>
    </body>
</html>