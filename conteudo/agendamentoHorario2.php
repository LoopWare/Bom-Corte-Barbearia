<?php 
require_once 'session.php';
error_reporting(0);

include '../classes/Agendamento.class.php';
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
    $foto = $_POST["foto"];
    $obs = $_POST["obs"];
    
    $barb = ucfirst($barb);
    
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
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
        
        <script>
        $(function() {
            $( "#calendario" ).datepicker({
                showOn: "button",
                showButtonPanel:true,
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                minDate:0,
                beforeShowDay: my_check 
            });
            
            function my_check(in_date) { 
            	if (in_date.getDay() == 1) { 
                	return [false, "notav", 'Not Available']; 
                } else { 
                	return [true, "av", "available"]; 
                } 
            }
        });
        </script>
        
    </head>

    <body>
    	<div id="aj">
			<a style="text-decoration: none;" href="../"><img id="seta" src="../Imagens/seta/arrow.png" Alt="Seta para voltar" title="Seta para voltar"></a>
		</div>
    	<p> Cancelar Agendamento </p>
    	<br><br>
    	
        <div class="Horario"> 
            <div class="cardB">
                <div class="imgB">
                    <img src="<?php echo $foto; ?>" width="400px" height="500px">
                    <h4 id="h4t">Selecione um horário </h4>
                </div>
                <div class="schedule">
                    <div class="botoes">
                        <h3 id="h3t">Horários</br>
                        <h5> <?php echo"&#8492;&#8493" ?> = indisponível </h5>
                        <span id="sban">Barbeiro: <?php echo $barb; ?> </span>
                        </h3>
        				<form name="agenda" method="post" action="agendamentoFinal.php">
        					<input class="stelf" name="nome" value="<?php echo"$nome"; ?>">
        					<input class="stelf" name="cpf" value="<?php echo"$cpf"; ?>">
        					<input class="stelf" name="barbeiro" value="<?php $barb = strtolower($barb); echo"$barb"; ?>">
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
        					
        					$outBodyTable = "";
        					$fieldsItems= explode(",", str_replace(' ', '', $fieldsName));
        					while ($lines = mysqli_fetch_assoc($resultSet)) {
        					    if ($lines[$fieldsItems[7]] == $barb && $lines[$fieldsItems[5]] == $data){
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