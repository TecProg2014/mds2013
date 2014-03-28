<?php
/*
 File name: EFalhaLeituraSerieCategoria.php
 File description: exception for read kind
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class EFalhaLeituraSerieCategoria extends Exception{
	
	public function __construct(){
		$this->message = "Falha na leitura de categoria da planilha de serie historica!";
	}
}