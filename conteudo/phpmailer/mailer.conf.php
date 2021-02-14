<?php
/*	
*	by cleber@ifsp.edu.br 2020.out
* 
*	Coloque aqui as configurações do Servidor de Email
*
*	No caso do Google após tentar mandar um email ele pode bloquear e será preciso entrar no gmail pra 
*	validar possíveis tentativas de acesso por smtp
* 
*	Exemplo usando o gmail como forma de envio
*/	

    $smtpHost   = "smtp.gmail.com";
    $smtpUser   = "bom.corte.naoresponda@gmail.com";
    $smtpPass   = "oBOMn3CORTEqq";
    $smtpPort   = "587";
    $smtpAuth   = "TLS/SSL";

/*	
 *	Exemplo para Google: 
 *		Host:	smtp.gmail.com;
 * 		porta:	 25, depreciada por falta de segurança; 
 *		porta:	465, se estiver usando o SSL ;
 *		porta: 	587, se estiver usando o TLS;
 *	
 *	Secure Socket Layer (SSL) é um padrão global em tecnologia de segurança desenvolvida pela Netscape em 1994. 
 *	Ele cria um canal criptografado entre um servidor web e um navegador (browser) para garantir que todos os 
 *	dados transmitidos sejam sigilosos e seguros. 
 * 
 * 	O TLS (Transport Layer Security) é um protocolo criptográfico cuja função é conferir segurança para a 
 * 	comunicação na Internet para serviços como email (SMTP), navegação por páginas (HTTP) e outros tipos de 
 * 	transferência de dados.
 * 
 * 	O TLS tem a capacidade de trabalhar em portas diferentes e usa algoritmos de criptografia mais fortes como 
 * 	o keyed-Hashing for Message Authentication Code (HMAC) enquanto o SSL apenas Message Authentication Code (MAC). 
 * 
 */
?>
