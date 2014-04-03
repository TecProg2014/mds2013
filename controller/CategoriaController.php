<?php
/*
 File name: CategoriaController.php
 File description: insert, consult, show and sum some category information
 Authors: Lucas Andrade, Eduardo, S�rgio, Lucas, Eliseu
*/

include_once('C:/xampp/htdocs/mds2013/persistence/CategoriaDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Categoria.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');

class CategoriaController{
	private $categoriaDAO;
	
	public function __construct(){
		$this->categoriaDAO = new CategoriaDAO();
	}
        
	public function __constructTeste(){
        //tests instance of categoriaDAO
		$this->categoriaDAO->__constructTeste();
	}
        
	public function _listarTodas(){
	//lists categorys
                $arrayCategoria = $this->categoriaDAO->listarTodas();
		return $arrayCategoria;
	}
        
	public function _listarTodasAlfabicamente(){
        //lists categorys alphabeticaly
		return  $this->categoriaDAO->listarTodasAlfabicamente();
	}
        
	public function _consultarPorId($id){
	//consults category by its id	
		 if(!is_numeric($id)){
			throw new EErroConsulta();
		 }
		 $categoria = $this->categoriaDAO->consultarPorId($id);
		 return $categoria;
	}
        
	public function _consultarPorNome($nomeCategoria){
	//consults category by name	
		 if(!is_string($nomeCategoria)){
		 	throw new EErroConsulta();
		 }
		 $categoria =  $this->categoriaDAO->consultarPorNome($nomeCategoria);
		 return $categoria;
	}
        
	public function _inserirCategoria(Categoria $categoria){
	//inserts categories
                return $this->categoriaDAO->inserirCategoria($categoria);
	}
        
	public function _inserirCategoriaArrayParseSerie($arrayCategoria){	
		if(!is_array($arrayCategoria)){
			throw new EErroConsulta();
		}
		$dadosCategoria = new Categoria();
		for($i=0; $i<count($arrayCategoria);$i++){
			$dadosCategoria->__setNomeCategoria($arrayCategoria[$i]);
			$retorno = $this->categoriaDAO->inserirCategoria($dadosCategoria);
		}
		return $retorno;
	}
	
	public function _somaTotalFurtos(){
        //all thefts category
			for($i=2010; $i<2012; $i++){
				$somaTotalFurtos[] = $this->categoriaDAO->somaTotalFurtos($i);
			}
			$retornoSomaTotalFurtos = array_sum($somaTotalFurtos);
			return $retornoSomaTotalFurtos;
	}

	public function _somaTotalDignidadeSexual(){
        //all crimes in sexual dignity category
		$somaDignidadeSexual;
		for($i=2001; $i<2012; $i++){
			$somaDignidadeSexual[] = $this->_somaTotalDignidadeSexual($i);
		}
		$retornoSomaTotalDignidadeSexual = array_sum($somaDignidadeSexual);
		return $retornoSomaTotalDignidadeSexual;
	}

	public function _somaTotalDignidadeSexual2010_2011(){
        //all crimes in sexual dignity in 2010 and 2011
		for($i=2010; $i<2012; $i++){
			$somaTotalDignidadeSexual2010_2011[] = $this->_somaTotalDignidadeSexual($i);
		}
		$retornoSomaTotalDignidadeSexual2010_2011 = array_sum($somaTotalDignidadeSexual2010_2011);
		return $retornoSomaTotalDignidadeSexual2010_2011;
	}

	public function _somaTotalAcaoPolicial(){
        //all policial actions
		for($i=2001; $i<2012; $i++){
			$somaTotalAcaoPolicial[] = $this->_somaTotalAcaoPolicial($i);
		}
		$retornoSomaTotalAcaoPolicial = array_sum($somaTotalAcaoPolicial);
		return $retornoSomaTotalAcaoPolicial;
	}

	public function _somaTotalAcaoPolicial2010_2011(){
        //all policial actions in 2010 and 2011
		for($i=2010; $i<2012; $i++){
			$somaTotalAcaoPolicial2010_2011[] = $this->_somaTotalAcaoPolicial($i);
		}
		$retornoSomaTotalAcaoPolicial2010_2011 = array_sum($somaTotalAcaoPolicial2010_2011);
		return $retornoSomaTotalAcaoPolicial2010_2011;
	}

	public function _somaGeralCrimeContraPessoa(){
        //all crimes against person category
		for($i=2001; $i<2012; $i++){
			$somaGeralCrimeContraPessoa[] = $this->categoriaDAO->somaGeralCrimeContraPessoa($i);
		}
		$retornoSomaGeralCrimeContraPessoa = array_sum($somaGeralCrimeContraPessoa);
		return $retornoSomaGeralCrimeContraPessoa;
	}

	public function _somaGeralCrimeContraPessoa2010_2011(){
        //all crimes against person in 2010 and 2011
		for($i=2010; $i<2012; $i++){
			$somaGeralCrimeContraPessoa2010_2011[] = $this->categoriaDAO->somaGeralCrimeContraPessoa($i);
		}
		$retornoSomaGeralCrimeContraPessoa2010_2011 = array_sum($somaGeralCrimeContraPessoa2010_2011);
		return $retornoSomaGeralCrimeContraPessoa2010_2011;
	}

	public function _somaTotalRoubo(){
        //all robberies categories
		for($i=2001; $i<2012; $i++){
			$somaTotalRoubo[] = $this->categoriaDAO->somaTotalRoubo($i);
		}
		$retornoSomaTotalRoubo = array_sum($somaTotalRoubo);
		return $retornoSomaTotalRoubo;
	}

	public function _somaTotalRoubo2010_2011(){
        //all robberies in 2010 and 2011
		for($i=2010; $i<2012; $i++){
			$somaTotalRoubo2010_2011[] = $this->_somaTotalRoubo($i);
		}
		$retornoSomaTotalRoubo2010_2011 = array_sum($somaTotalRoubo2010_2011);
		return $retornoSomaTotalRoubo2010_2011;
	}

	public function _contarRegistros(){
        //count records
		return $this->categoriaDAO->contarRegistros();
	}
	
	public function _listarTotalDeCategoria(){
        //lists all categories
		$categorias = $this->categoriaDAO->listarTotalDeCategoria();
		return "
		var data = [
		{ label: \"".$categorias["nome"][0]."\",  data: ".$categorias["quantidade"][0]."},
		{ label: \"".$categorias["nome"][1]."\",  data: ".$categorias["quantidade"][1]."},
		{ label: \"".$categorias["nome"][2]."\",  data: ".$categorias["quantidade"][2]."},
		{ label: \"".$categorias["nome"][3]."\",  data: ".$categorias["quantidade"][3]."},
		{ label: \"".$categorias["nome"][4]."\",  data: ".$categorias["quantidade"][4]."}
		];";
	}
}