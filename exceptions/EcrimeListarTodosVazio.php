<?php
/*
 File name: EcrimeListarTodosVazio.php
 File description: exception for list crime
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class EcrimeListarTodosVazio extends Exception{
//customizing exception to throw a message when exception is triggered

	public function __construct(){
		$this->message = "Problema ao listar crimes.";
	}
}