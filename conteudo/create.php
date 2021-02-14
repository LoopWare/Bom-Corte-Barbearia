<?php
require_once 'session.php';
error_reporting(0);

if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}

include_once '../classes/Usuario.class.php';
use classes\Usuario;

$idUsuario = $_SESSION["idUsuario"];

$usuario0 = new Usuario($idUsuario, "", "", "", "", "", "", "");
$resultSet = $usuario0->read();

$linha = mysqli_fetch_assoc($resultSet);

if( $linha['idTipoUsuario'] != "4" && $linha['idTipoUsuario'] != "5" ){
    header("Location:../");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="crud.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="logo.jpg" />
        <title> BC ADM Criar</title>
        
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
        
        <script >
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
        <div id="perfil">
        	<div id="infoPerfil">
        		<h3>
            		<?php 
            		echo $linha["email"];
            		?>
        		</h3>
        		<br>
        		<div id="ajust">
        			<div id="linkPerf">
            			<a style="margin-right:20px;" href="adm.php"> <img src="../Imagens/opc/arrow.png" class="img-circle" Alt="voltar" title="Voltar"> <br> <p class="pfirst"> Voltar </p> </a>
                		<br>
        			</div>
                    <div id="infoAlt">
                        <div id="adm">
                        	<script>
                        			function VerificacaoCreateCRUD(){
                        				
                        				var cpf= create.cpf.value;
                        				var data = create.data.value;
                        				var idCorte= create.idCorte.value;
                        				var barbeiro= create.barbeiro.value;
                        				var hora= create.hora.value;
                        				
                        				if (cpf.length <= 10 || cpf.length >= 12) {
                        					create.action = "errorForm.php";
                            				alert("Preencha o Cpf corretamente, com 11 digitos");
                            				create.cpf.focus()
                            				return false;
                        				} else {
                                			create.action = "createVerific.php";
                                		}
                        				
                        				if (data >= 11 || data <= 9) {
                        					create.action = "errorForm.php";
                                			alert("Preencha uma data corretamente!");
                                    		create.data.focus()
                                    		return false;
                                		} else {
                                			create.action = "createVerific.php";
                                		}
                        				
                        				if (idCorte > 21 || idCorte <= 0) {
                        					create.action = "errorForm.php";
                            				alert("Preencha o código do corte corretamente!");
                            				create.idCorte.focus()
                            				return false;
                        				} else {
                                			create.action = "createVerific.php";
                                		}
                        				
                        				if (barbeiro.length >= 8 || barbeiro.length <= 4) {
                        					create.action = "errorForm.php";
                            				alert("Coloque o nome do barbeiro corretamente!");
                            				create.barbeiro.focus()
                            				return false;
                        				} else {
                                			create.action = "createVerific.php";
                                		}
                                		
                                		if (hora >= 6 || hora <= 4) {
                                			create.action = "errorForm.php";
                            				alert("Preencha o horário corretamente!");
                            				create.hora.focus()
                            				return false;
                        				} else {
                                			create.action = "createVerific.php";
                                		}
                        			}
                        		</script>
                        	<div class="search">
                        	<h1>Criar </h1>
                        	<div class="linha">
                        	<form name="create" method="post" action="">
                        
                        		<div class="col">
                        			<div class="input">
                        				<span class="text" style="background:#FFC300;color:#fff;">CPF</span>
                        				<span class="line"></span>
                        				<input onchange="VerificacaoCreateCRUD(this.value)" type="text" name="cpf" maxlength='11' required>
                        			</div>
                        		</div>
                        
                        		<div class="col">
                        			<div class="input">
                        				<span class="text">Data</span>
                        				<span class="line"></span>
                        				<input type="text" maxlength='10' name="data" id="calendario" onchange="VerificacaoCreateCRUD(this.value)" required>
                        			</div>
                        		</div>
                        
                        		<div class="col">
                        			<div class="input">
                        				<span class="text">Corte</span>
                        				<span class="line"></span>
                        				<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onchange="VerificacaoCreateCRUD(this.value)" maxlength='2' type="number" name="idCorte" required>
                        			</div>
                        		</div>
                        
                        		<div class="col">
                        			<div class="input">
                        				<span class="text">Barbeiro</span>
                        				<span class="line"></span>
                        				<input onchange="VerificacaoCreateCRUD(this.value)" type="text" name="barbeiro" required>
                        			</div>
                        		</div>
                        
                        		<div class="col">
                        			<div class="input">
                        				<span class="text">Obs</span>
                        				<span class="line"></span>
                        				<input type="text" name="descricao">
                        			</div>
                        		</div>
                        		
                        		<div class="col">
                        			<div class="input">
                        				<span class="text">Horário</span>
                        				<span class="line"></span>
                        				<input onchange="VerificacaoCreateCRUD(this.value)" type="text" name="hora" maxlength='5' required >
                        			</div>
                        		</div>
                            	<div class="row100">
                            		<input type="image" src="../Imagens/crud/create.png" style="width: 40px; height: 40px; background: transparent;" value="enviar">
                            	</div>	
                        	</form>
                        	</div>	
                        	</div>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>
        <br><br><br>
    </body>
</html>