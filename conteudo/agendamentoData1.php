<?php
require_once 'session.php';
error_reporting(0);

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
    $foto = $_POST["foto"];
    $obs = $_POST["obs"];
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
    <script>
    	function VerificacaoAgend(){
    		
    		var data = formData.data.value;
    		
    		if (data >= 11 || data <= 9) {
    			formData.action = "errorForm.php";
    			alert("Preencha uma data corretamente!");
        		agenda.name.focus()
        		return false;
    		} else {
    			formData.action = "agendamentoHorario1.php";
    		}
    	}
	</script>
		<div id="aj">
			<a style="text-decoration: none;" href="../"><img id="seta" src="../Imagens/seta/arrow.png" Alt="Seta para voltar" title="Seta para voltar"></a>
		</div>
    	<p> Cancelar Agendamento </p>
    	<br><br>
    	
        <div class="Horario"> 
            <div class="cardB">
            	<form name="formData" id="formData" name="agenda" method="post" action="">
        			<p> Data: <input type="text" maxlength='10' name="data" id="calendario" onchange="VerificacaoAgend(this.value)" required></p>
        				<input class="stelf" name="nome" value="<?php echo $nome; ?>">
        				<input class="stelf" name="cpf" value="<?php echo $cpf; ?>">
        				<input class="stelf" name="barbeiro" value="<?php echo $barb; ?>">
        				<input class="stelf" name="corte" value="<?php echo $serv; ?>">
        				<input class="stelf" name="foto" value="<?php echo $foto; ?>">
        				<input class="stelf" name="obs" value="<?php echo $obs; ?>">
        			<div class="inputBox">
                        <input class="btEnviar" type="submit" value="Horários">
                    </div>
            	</form>
            </div>
        </div>
    </body>
</html>