<?php
/*
 File name: ENaturezaListarTodosVazio.php
 File description: exception for list kind
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ENaturezaListarTodosVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao listar natureza.";
	}
}
