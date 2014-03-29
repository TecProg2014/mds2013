<?php
/*
 File name: EFalhaLeituraSerieCrime.php
 File description: exception for read crime
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class EFalhaLeituraSerieCrime extends Exception{
//customizing exception to throw a message when exception is triggered
	
	public function __construct(){
		$this->message = "Falha na leitura de crime da planilha serie historica!";
	}
}