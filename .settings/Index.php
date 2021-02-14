<?php
require_once 'conteudo/session.php';

?>
<!DOCTYPE html>
<html>
    <head>

        <title> Bom Corte </title>
        <link rel="shortcut icon" type="x-icon" href="Imagens/bom_corte/logo.jpg" >

        <link   rel="stylesheet" 
                href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
                crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script type="text/javascript" src="jquery-3.4.1.js" ></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="css.css">

        <script type="text/javascript">

            function carregar () {
                $('#menu').load( 'conteudo/menu.php' );
                $('#logo').load( 'conteudo/logo.html' );
                $('#body').load( 'conteudo/body.html' );
                $('#footer').load( 'conteudo/footer.html' );
            }

            $(document).ready(function(){

                $(window).scroll(function(){
                    if ($(this).scrollTop() > 100) {
                        $('a[href="#top"]').fadeIn();
                    } else {
                        $('a[href="#top"]').fadeOut();
                    }
                });

                $('a[href="#top"]').click(function(){
                    $('html, body').animate({scrollTop : 0}, 'slow');
                    return false;
                });
    			
            });

        </script>
    </head>
    <body onload="carregar()">
        <div id="menu">InnerHTML</div>
        <div id="logo">InnerHTML</div>
        <div id="body">InnerHTML</div>
        <div id="footer">InnerHTML</div>
        <a href="#top" class="back"> <img id="setaTop" src="Imagens/seta/arrowGold.png" width="64px" height="64px" name="arrow" alt="Seta para Cima" /> </a>
    </body>
</html>