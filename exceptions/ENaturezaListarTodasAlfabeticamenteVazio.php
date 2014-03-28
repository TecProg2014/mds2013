<?php
/*
 File name: ENaturezaListarTodasAlfabeticamenteVazio.php
 File description: exception for list alphabetical
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class ENaturezaListarTodasAlfabeticamenteVazio extends Exception{

	public function __construct(){
		$this->message = "Ocorreu um problema ao tentar organizar natureza alfabeticamente.";
	}
}