<?php
/*
 File name: EFalhaLeituraSerieNatureza.php
 File description: exception for read kind
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class EFalhaLeituraSerieNatureza extends Exception{
	
	public function __construct(){
		$this->message = "Falha na leitura de naturezas da planilha serie historica!";
	}
}