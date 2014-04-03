<?php
/*
 File name: ECrimeConsultarIdNaturezaVazio.php
 File description: exception for consult crime id
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class ECrimeConsultarIdNaturezaVazio extends Exception{
//customizing exception to throw a message when exception 'consulting id and nature is empty' is triggered
    
	public function __construct(){
		$this->message = "Erro ao consultar o ID da natureza.";
	}
}