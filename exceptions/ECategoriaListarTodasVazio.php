<?php
/*
 File name: ECategoriaListarTodasVazio.php
 File description: exception for list categories
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ECategoriaListarTodasVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao listar categorias.";
	}
}