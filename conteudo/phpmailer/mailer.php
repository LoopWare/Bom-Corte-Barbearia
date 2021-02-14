<body>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions

if (!$_POST) {
    header("Location:../");
} else {
    $mail = new PHPMailer(true);
    $destEmail = $_POST['recEmail'];
    $cpf = $_POST['recCPF'];
    
    try {
        
        include 'mailer.conf.php';
        
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;      // Ativar saída de depuração detalhada
        $mail->isSMTP();                            // Enviar usando SMTP Server
        $mail->SMTPAuth   = true;                   // Habilitar autenticação SMTP Server
        $mail->Host       = $smtpHost;              // Endereço do SMTP Server para enviar
        $mail->Username   = $smtpUser;              // Nome de usuário SMTP Server
        $mail->Password   = $smtpPass;              // Senha SMTP Server
        $mail->SMTPSecure = (($smtpAuth=="TLS/SSL") ? (PHPMailer::ENCRYPTION_STARTTLS) : (PHPMailer::ENCRYPTION_SMTPS) );
        // Ative a criptografia TLS ou use `PHPMailer::ENCRYPTION_SMTPS`
        $mail->Port       = $smtpPort;              // Porta TCP para conectar, use 465 para `PHPMailer::ENCRYPTION_SMTPS`
        
        
        $destinatiario  = array(nome=>"bom.corte.naoresponda@gmail.com", email=>$destEmail);
        $destinatiario2 = array(nome=>"", email=>"");
        $reponderPara   = array(email=>"", informacao=>"");
        $comCopiaPara   = "";
        $comCopiaOculta = "";
        //Recipients
        $mail->setFrom($destinatiario["email"], $destinatiario["nome"]);
        if ( $destinatiario["email"] != "" )
            $mail->addAddress($destinatiario["email"], $destinatiario["nome"]);     // Adicionar o destinatário
            if ( $destinatiario2["email"] != "" )
                $mail->addAddress($destinatiario2["email"], $destinatiario2["nome"]);               // O nome é opcional
                if ( $reponderPara["email"] != "" )
                    $mail->addReplyTo($reponderPara["email"], $reponderPara["informacao"]);
                    if ( $comCopiaPara != "" )
                        $mail->addCC ( $comCopiaPara );
                        if ( $comCopiaOculta != "" )
                            $mail->addBCC( $comCopiaOculta );
                            
                            // Attachments
                            /*
                             $anexos = array("file1.jpg", "file2.jpg"); // Deve conter os  caminho e o nome futuro do arquivo
                             $mail->addAttachment($anexos[1]);         // Adicionar Anexos
                             $mail->addAttachment($anexos[2]);
                             */
                            
                            // Content
                            $mail->isHTML(true);                                  //  Email em formato HTML?
                            $mail->Subject = 'Recuperar Senha';
                            $mail->Body    = '
                      <div style="background-color: #111;">
                         <br>
                         <h1 style=" position: relative;
                         color: #fff; font-weight: 500; margin-bottom: 15px; text-align: center; font-size: 1.6vw;">
                            Recuperar senha <br>
                            Bom Corte
                         </h1>
                         <br>
                         <div style="width: 100%; color: #999; text-align: center; font-size: 1.4vw;">
                            Recebemos uma solicitação para a mudança de sua senha, clique no botão abaixo para ser redirecionado
                            a página da recuperação de sua senha
                         </div>
                         <br>
                         <div style="width: 100%;">
                             <form method="post" action="localhost/LoopWareP1/conteudo/confSenha.php">
                                <input style="visibility: hidden; opacity: 0; width: 0; height: 0;"
                                type="text" name="cpf" value="'.$cpf.'">
                                <input style="margin-left: auto; margin-right: auto; display: block; padding: 20px 26px;
                                border-radius: 5px; background-color: #FF9500; color: #000; border-color: #FF9500; font-size: 1.5vw;"
                                type="submit" value="Refazer minha senha ">
                             </form>
                         </div>
                         <br>
                         <br>
                         <br>
                      </div>
                     ';
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            $mail->SMTPDebug = 1; // 0 não mosta retorno do Servidor SMTP como ECHO
                            $mail->send();
                            
                            echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Mensagem não enviada! Erro: {$mail->ErrorInfo}";
    }
}

?>
</body>
