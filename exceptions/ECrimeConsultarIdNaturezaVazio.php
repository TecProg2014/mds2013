<?php
/*
 File name: ECrimeConsultarIdNaturezaVazio.php
 File description: exception for consult crime id
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ECrimeConsultarIdNaturezaVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao consultar o ID da natureza.";
	}
}