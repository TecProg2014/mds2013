<?php
/*
 File name: ECategoriaListarConsultaPorIdVazio.php
 File description: exception for id
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ECategoriaListarConsultaPorIdVazio extends Exception{

	public function __construct(){
		$this->message = "ID nao encontrado.";
	}
}