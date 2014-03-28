<?php
/*
 File name: EFalhaLeituraSerieTempo.php
 File description: exception for read time
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class EFalhaLeituraSerieTempo extends Exception{
	
	public function __construct(){
		$this->message = "Falha na leitura de tempo da planilha serie historica!";
	}
}