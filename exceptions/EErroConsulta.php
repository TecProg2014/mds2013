<?php
/*
 File name: EErroConsulta.php
 File description: exception for consult
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class EErroConsulta extends Exception{
//customizing exception to throw a message when exception of consult mistake is triggered

	public function __construct(){
		$this->message = "Algo errado em sua consulta";
	}
}