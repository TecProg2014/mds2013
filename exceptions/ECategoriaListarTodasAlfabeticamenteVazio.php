<?php
/*
 File name: ECategoriaListarTodasAfabelicamenteVazio.php
 File description: exception for list categories alphabetical
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ECategoriaListarTodasAlfabeticamenteVazio extends Exception{

	public function __construct(){
		$this->message = "Problema ao listar categorias alfabeticamente.";
	}
}