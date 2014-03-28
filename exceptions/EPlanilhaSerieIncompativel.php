<?php
/*
 File name: EPlanilhaSerieIncompativel.php
 File description: exception for series
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class EPlanilhaSerieIncompativel extends Exception{
	
	public function __construct(){
		$this->message = "Esta planilha não e de serie historica!";
	}
}