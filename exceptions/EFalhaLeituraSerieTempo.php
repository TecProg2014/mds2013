<?php
/*
 File name: EFalhaLeituraSerieTempo.php
 File description: exception for read time
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class EFalhaLeituraSerieTempo extends Exception{
//customizing exception to throw a message when exception is triggered
	
	public function __construct(){
		$this->message = "Falha na leitura de tempo da planilha serie historica!";
	}
}