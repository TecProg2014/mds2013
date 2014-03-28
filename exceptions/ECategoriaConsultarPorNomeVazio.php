<?php
/*
 File name: ECategoriaConsultaPorNomeVazio.php
 File description: exception for consult category by name
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ECategoriaConsultarPorNomeVazio extends Exception{
	
	public function __construct(){
		$this->message = "Erro ao consultar categoria por nome.";
	}
}

