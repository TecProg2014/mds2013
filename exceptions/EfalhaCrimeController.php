<?php
/*
 File name: EFalhaCrimeController.php
 File description: exception for crime controller function
 Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
*/

class EFalhaCrimeController extends Exception{
//customizing exception to throw a message when exception in crime controlles is triggered
    
	public function __construct(){
		$this->message = "Problema em alguma funcao de crime controller";
	}
}