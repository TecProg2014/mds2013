<?php
/*
 File name: ECrimeConsultarIdTempoVazio.php
 File description: exception for consult time crime
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ECrimeConsultarIdTempoVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao consultar tempo do crime.";
	}
}