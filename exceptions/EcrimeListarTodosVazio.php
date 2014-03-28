<?php
/*
 File name: EcrimeListarTodosVazio.php
 File description: exception for list crime
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class EcrimeListarTodosVazio extends Exception{

	public function __construct(){
		$this->message = "Problema ao listar crimes.";
	}
}