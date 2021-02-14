<?php 
require_once 'session.php';
require_once '../classes/Cortes.class.php';
include_once '../classes/Usuario.class.php';
use classes\Usuario;
use classes\Agendamento;
/* use classes\Cortes; */

if ( $_SESSION["idUsuario"] == "" ){
    header("Location:agendamento.php");
}

$idUsuario = $_SESSION["idUsuario"];

$usuario0 = new Usuario($idUsuario, "", "", "", "", "", "", "");
$resultSet = $usuario0->read();

$linha = mysqli_fetch_assoc($resultSet);


?>
<script>
	function VerificacaoAgend(){
				
		var name= agenda.nome.value;
		var serv = agenda.corte.value;
		var barb = agenda.barbeiro.value;
		
		if (barb == "") {
			Prof.src = "Imagens/bom_corte/logo.jpg";
			Fot.value = "";
		} else {
			Prof.src = "Imagens/barbeiros/" + barb + ".png";
			Fot.value = "../Imagens/barbeiros/" + barb + ".png";
		}
		
		if (barb == "") {
			formAgenda.action = "conteudo/errorForm.php";
		} else {
			if (barb == "douglas") {
				if(serv == ""){
					formAgenda.action = "conteudo/errorForm.php";
				} else {
					formAgenda.action = "conteudo/agendamentoData1.php";
				}
    		} else {
    			if(serv == ""){
					formAgenda.action = "conteudo/errorForm.php";
				} else {
					formAgenda.action = "conteudo/agendamentoData2.php";
				}
    		}
		}
		
		if (barb == "douglas") {
			if(serv == "" ){
				document.getElementById("preco").innerHTML = "";
			}
			if(serv == "1"){
				document.getElementById("preco").innerHTML = "40,00";
			}
			if(serv == "2"){
				document.getElementById("preco").innerHTML = "30,00";
			}
			if(serv == "3"){
				document.getElementById("preco").innerHTML = "25,00";
			}
			if(serv == "4"){
				document.getElementById("preco").innerHTML = "20,00";
			}
			if(serv == "5"){
				document.getElementById("preco").innerHTML = "45,00";
			}
			if(serv == "6"){
				document.getElementById("preco").innerHTML = "50,00";
			}
			if(serv == "7"){
				document.getElementById("preco").innerHTML = "60,00";
			}
			if(serv == "8"){
				document.getElementById("preco").innerHTML = "25,00";
			}
			if(serv == "9"){
				document.getElementById("preco").innerHTML = "20,00";
			}
			if(serv == "10"){
				document.getElementById("preco").innerHTML = "60,00";
			}
			if(serv == "11"){
				document.getElementById("preco").innerHTML = "60,00";
			}
			if(serv == "12"){
				document.getElementById("preco").innerHTML = "60,00";
			}
			if(serv == "13"){
				document.getElementById("preco").innerHTML = "70,00";
			}
			if(serv == "14"){
				document.getElementById("preco").innerHTML = "90,00";
			}
			if(serv == "15"){
				document.getElementById("preco").innerHTML = "25,00";
			}
			if(serv == "16"){
				document.getElementById("preco").innerHTML = "20,00";
			}
			if(serv == "17"){
				document.getElementById("preco").innerHTML = "100,00";
			}
			if(serv == "18"){
				document.getElementById("preco").innerHTML = "30,00";
			}
			if(serv == "19"){
				document.getElementById("preco").innerHTML = "30,00";
			}
			if(serv == "20"){
				document.getElementById("preco").innerHTML = "30,00";
			}
			if(serv == "21"){
				document.getElementById("preco").innerHTML = "50,00";
			}
		}
		
		if (barb != "douglas") {
			if(serv == ""){
				document.getElementById("preco").innerHTML = "";
			}
			if(serv == "1"){
				document.getElementById("preco").innerHTML = "30,00";
			}
			if(serv == "2"){
				document.getElementById("preco").innerHTML = "25,00";
			}
			if(serv == "3"){
				document.getElementById("preco").innerHTML = "20,00";
			}
			if(serv == "4"){
				document.getElementById("preco").innerHTML = "15,00";
			}
			if(serv == "5"){
				document.getElementById("preco").innerHTML = "35,00";
			}
			if(serv == "6"){
				document.getElementById("preco").innerHTML = "40,00";
			}
			if(serv == "7"){
				document.getElementById("preco").innerHTML = "45,00";
			}
			if(serv == "8"){
				document.getElementById("preco").innerHTML = "20,00";
			}
			if(serv == "9"){
				document.getElementById("preco").innerHTML = "15,00";
			}
			if(serv == "10"){
				document.getElementById("preco").innerHTML = "50,00";
			}
			if(serv == "11"){
				document.getElementById("preco").innerHTML = "50,00";
			}
			if(serv == "12"){
				document.getElementById("preco").innerHTML = "50,00";
			}
			if(serv == "13"){
				document.getElementById("preco").innerHTML = "70,00";
			}
			if(serv == "14"){
				document.getElementById("preco").innerHTML = "80,00";
			}
			if(serv == "15"){
				document.getElementById("preco").innerHTML = "20,00";
			}
			if(serv == "16"){
				document.getElementById("preco").innerHTML = "15,00";
			}
			if(serv == "17"){
				document.getElementById("preco").innerHTML = "100,00";
			}
			if(serv == "18"){
				document.getElementById("preco").innerHTML = "25,00";
			}
			if(serv == "19"){
				document.getElementById("preco").innerHTML = "30,00";
			}
			if(serv == "20"){
				document.getElementById("preco").innerHTML = "25,00";
			}
			if(serv == "21"){
				document.getElementById("preco").innerHTML = "50,00";
			}
		}
	}
</script>

<div class="Agendando"> 
    <div class="formBx"> 
        <form name="agenda" id="formAgenda" method="post" action="">
            <h2>Agendando</h2>
            <div class="inputBox">
            	<p> <?php echo $linha["nome"]; ?> </p>
                <input class="stelf" onchange="VerificacaoAgend(this.value)" type="text" name="nome" required value="<?php echo $linha["nome"]; ?>">
                <span> Nome  </span>
            </div>
            <br><br>
            <div class="inputBox">
            	<p> <?php echo $linha["cpf"]; ?> </p>
            	<input class="stelf" onchange="VerificacaoAgend(this.value)" type="text" name="cpf" maxlength='11' required value="<?php echo $linha["cpf"]; ?>">
                <span> Cpf  </span>
            </div>
            <div class="inputBox">
                <select name="barbeiro" onchange="VerificacaoAgend(this.value)">
                <option value="">Mostrar todos </option>
                <!-- Gerar o resto Automaticamente-->
                <option value="douglas"> 	Douglas </option>
              	<option value="antonio"> 	Antonio </option>
              	<option value="artur"> 		Artur 	</option>
              	<option value="cleison">	Cleison </option>
              	<option value="kevin"> 		Kevin 	</option>
                </select>
                <p> Profissional</p>
                <input class="stelf" name="foto" id="Fot" value="">
            </div>
            <div class="inputBox">
                <select name="corte" required onchange="VerificacaoAgend(this.value)"> 
                    <option value=""> Buscar Cortes </option>
                    <!-- Gerar o resto Automaticamente-->
                    <option value="1"> Corte com degradê na gilete </option>
                    <option value="2"> Corte com degradê </option>
                    <option value="3"> Corte sem degradê simples </option>
                    <option value="4"> Corte só maquininha e pezinho </option>
                    <option value="5"> Corte e barba sem degradê </option>
                    <option value="6"> Corte e barba com degradê </option>
                    <option value="7"> Corte e barba com degradê na gilete </option>
                    <option value="8"> Alisamento </option>
                    <option value="9"> Barba </option>
                    <option value="10"> Corte com luzes </option>
                    <option value="11"> Corte com pigmentação completa </option>
                    <option value="12"> Corte com pintura </option>
                    <option value="13"> Corte com progressiva </option>
                    <option value="14"> Corte com progressiva e barba </option>
                    <option value="15"> Corte infantil com degradê </option>
                    <option value="16"> Corte infantil simples </option>
                    <option value="17"> Corte e platinado </option>
                    <option value="18"> Luzes </option>
                    <option value="19"> Pigmentação </option>
                    <option value="20"> Pintura </option>
                    <option value="21"> Progressiva </option>
                </select>
                <p> Serviço</p>
            </div>
            <div class="inputBox">
                <textarea name="obs" > </textarea>
                <span> Observação </span>
            </div>
            <div class="inputBox">
                <input type="submit" value="Buscar">
            </div>
        </form>
    
    </div>

    <div class="imgBx"> 
        <img src="Imagens/bom_corte/logo.jpg"  id="Prof">

        <ul class="PD">
            <li>Preço: R$ <p style="float: right; margin-left: 3px;" id="preco"> </p></li>
        </ul>
    </div>

</div>
<br><br>