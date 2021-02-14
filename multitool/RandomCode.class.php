<?php
/*
	Profº Ms. Cleber S. Oliveira
	IFSP - Campus Guarulhos
	cleber@ifsp.edu.br / cleber.gulhos@gmail.com
	https://github.com/cleber-oliveira
*/

namespace multitool;

class RandomCode{
    
    public function __construct() {}
    
    public function generate( int $qtd ) {
        
        $dic = "@#$%0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";   
        
        $dicSize = strlen($dic);
        $code    = "";
        for ($i = 0; $i < $qtd; $i++) {
            $aleatorio =  rand(0, $dicSize-1);
            $code .= $dic[$aleatorio];
        }
        return ( $code );
    }
}

?>