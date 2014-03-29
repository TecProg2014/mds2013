<?php
/*
 File name: ECategoriaListarTodasAfabelicamenteVazio.php
 File description: exception for list categories alphabetical
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class ECategoriaListarTodasAlfabeticamenteVazio extends Exception{
//customizing exception to throw a message when exception is triggered

	public function __construct(){
		$this->message = "Problema ao listar categorias alfabeticamente.";
	}
}