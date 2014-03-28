<?php
/*
 File name: ECrimeConsultarPorIdVazio.php
 File description: exception for consult crime id
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ECrimeConsultarPorIdVazio extends Exception{

	public function __construct(){
		$this->message = "Problema ao consultar ID de crime.";
	}
}