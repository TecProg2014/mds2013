<?php
/*
 File name: ECrimeConsultarIdTempoVazio.php
 File description: exception for consult time crime
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class ECrimeConsultarIdTempoVazio extends Exception{
//customizing exception to throw a message when exception consulting id empty time is triggered

	public function __construct(){
		$this->message = "Erro ao consultar tempo do crime.";
	}
}