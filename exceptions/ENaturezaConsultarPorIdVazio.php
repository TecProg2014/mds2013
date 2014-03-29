<?php
/*
 File name: ENaturezaConsultarPorIdVazio.php
 File description: exception for kind id
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class ENaturezaConsultarPorIdVazio extends Exception{
//customizing exception to throw a message when exception is triggered

	public function __construct(){
		$this->message = "Erro ao consultar ID da natureza.";
	}
}