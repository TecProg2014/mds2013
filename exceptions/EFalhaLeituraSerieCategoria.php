<?php
/*
 File name: EFalhaLeituraSerieCategoria.php
 File description: exception for read kind
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class EFalhaLeituraSerieCategoria extends Exception{
//customizing exception to throw a message when exception is triggered
	
	public function __construct(){
		$this->message = "Falha na leitura de categoria da planilha de serie historica!";
	}
}