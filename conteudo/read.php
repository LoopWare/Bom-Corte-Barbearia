<?php
require_once 'session.php';

if ( $_SESSION["idUsuario"] == "" ){
    header("Location:../");
}

require_once '../database/DBQuery.class.php';
include_once '../classes/Usuario.class.php';
use classes\Usuario;
use database\DBQuery;

// Monta Cabeçalho e Rodapé da Tabela
$headTableItems = array("Cod","Nome","E-mail","Telefone","CPF","Data","Horário","Barbeiro","Descrição","Corte","Preço 01","Preço 02","Categoria");
$outHeadTable = "";
for($i=0; $i< count($headTableItems); $i++){
    $outHeadTable .= "\n\t\t<th style='background: #FFAA00; color: #000;'>".$headTableItems[$i]."</th>";
}

// Monta Corpo da Tabela
$tableName  = "view_agendamento";
$fieldsName = "idAgendamento, nome, email, telefone, cpf, data, horario, barbeiro, descricao,corte, preco, preco2, categoria";
$fieldKey   = "idAgendamento";

$dbQuery   = new DBQuery($tableName, $fieldsName, $fieldKey);
$resultSet = $dbQuery->select("");

$outBodyTable = "";
$fieldsItems= explode(",", str_replace(' ', '', $fieldsName));
while ($lines = mysqli_fetch_assoc($resultSet)) {
    $outBodyTable .= "\n\t<tr>";
    for($i=0; $i< count($fieldsItems); $i++){
        $outBodyTable .= "\n\t\t<td style='background: #000; color: #FFF;'>".$lines[$fieldsItems[$i]]."</td>";
    }
    $outBodyTable .= "\n\t</tr>";
}

$idUsuario = $_SESSION["idUsuario"];

$usuario0 = new Usuario($idUsuario, "", "", "", "", "", "", "");
$resultSet2 = $usuario0->read();

$linha2 = mysqli_fetch_assoc($resultSet2);

if( $linha2['idTipoUsuario'] != "4" && $linha2['idTipoUsuario'] != "5" ){
    header("Location:../");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>BC ADM Busca</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="crud.css" rel="stylesheet">
  <link rel="shortcut icon" href="logo.jpg" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
  <script src='https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js'></script>
  <script type='text/javascript's>
		$(document).ready(function() {
			$('#table').DataTable( {
				"order": [[ 3, "desc" ]]
			});
		});
  </script>
</head>
    <body>
    	<div id="perfil">
        	<div id="infoPerfil">
        		<h3>
            		<?php 
            		echo $linha2["email"];
            		?>
        		</h3>
        		<br>
        		<div id="ajust">
        			<div id="linkPerf">
            			<a style="margin-right:20px;" href="adm.php"> <img src="../Imagens/opc/arrow.png" class="img-circle" Alt="voltar" title="Voltar"> <br> <p class="pfirst"> Voltar </p> </a>
                		<br>
        			</div>
        			<h1>Buscar </h1>
        			<br><br><br><br><br>
                    <div id="infoAltR">
                        <div id="admR">
                        	<div class="search">
                        	<div class="linha">
                        		<table id="table" class="display" style="width:100%">
                                	<thead>
                                		<br>
                                		<tr>
                                			<?=$outHeadTable?>
                                		</tr>
                                	</thead>
                                	<tbody>
                                		<?=$outBodyTable?>
                                	</tbody>
                                	<tfoot>
                                		<tr>
                                			<?=$outHeadTable?>
                                		</tr>
                                	</tfoot>
                                	<br>
                                </table>
                        		
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