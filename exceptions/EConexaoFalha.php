<?php
/*
 File name: EConexaoFalha.php
 File description: exception for database connection
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class EConexaoFalha extends Exception{

	public function __construct(){
		$this->message = "Conexao com o Banco Falhou";
	}
}