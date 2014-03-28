<?php
/*
 File name: EFalhaCrimeController.php
 File description: exception for crime controller function
 Authors: Lucas Andrade, Eduardo Augusto, Sérgio Bezerra, Lucas Carvalho, Eliseu
*/
class EFalhaCrimeController extends Exception{

	public function __construct(){
		$this->message = "Problema em alguma funcao de crime controller";
	}
}