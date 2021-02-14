<ul id="ulMenu">
    <div class="login" >  
    	<?php 
    	require_once 'session.php';
    	if(isset($_SESSION["idUsuario"])):
    	?>
                    <a id="log" href="#" onclick="$('#body').load('conteudo/perfil.php');">
                        <img src="Imagens/menu/user.png" id="user" class="img-circle">
                        </br>
                        <p>Perfil</p>
                    </a>
        <?php 
        endif;
        if(!isset($_SESSION["idUsuario"]) || $_SESSION["idUsuario"] == "0"):
        ?>
                    <a id="log" href="conteudo/login.php">
                        <img src="Imagens/menu/login.png" id="login" class="img-circle">
                        </br>
                        <p>Login</p>
                    </a>
        <?php 
        endif;
        ?>
    </div>

    <li> <a href="#" onclick="$('#body').load('conteudo/body.html');">          Home 		</a> </li>
    <li> <a href="#" onclick="$('#body').load('conteudo/sobre.html');"> 		Sobre     	</a> </li>
    <li> <a href="#" onclick="$('#body').load('conteudo/produtos.html');">  	Produtos  	</a> </li>

    <img id="logoMenu" src="Imagens/bom_corte/logo.jpg" class="img-circle" Alt="logo" title="BomCorte">
  
    <li> <a href="#" onclick="$('#body').load('conteudo/agendamento.php');">  	Agendamento	</a> </li> 
    <li> <a href="#" onclick="$('#body').load('conteudo/cortes.html');">  		Cortes     	</a> </li>
    <li> <a href="#" onclick="$('#body').load('conteudo/contato.html');">  		Contato    	</a> </li>

    
</ul>