<?php
/*
 File name: EFalhaLeituraSerieCrime.php
 File description: exception for read crime
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class EFalhaLeituraSerieCrime extends Exception{
	
	public function __construct(){
		$this->message = "Falha na leitura de crime da planilha serie historica!";
	}
}