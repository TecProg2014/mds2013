<?php

/*
  File name: NaturezaController.php
  File description: insert, consult, show and sum some kind informations
 */

include_once('C:/xampp/htdocs/mds2013/persistence/NaturezaDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/CategoriaDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Natureza.php');
include_once('C:/xampp/htdocs/mds2013/model/Categoria.php');
include_once('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EFalhaNaturezaController.php');

class NaturezaController {

    private $naturezaDAO;

    public function __construct() {
        $this->naturezaDAO = new NaturezaDAO();
    }

    public function __constructTeste() {
        //tests instance of naturezaDAO
        $this->naturezaDAO->__constructTeste();
    }

    public function _listarTodas() {
        //lists all
        $resultado = $this->naturezaDAO->listarTodas();

        return $resultado;
    }

    public function _listarTodasAlfabicamente() {
        //lists all alphabeticaly
        $resultado = $this->naturezaDAO->listarTodasAlfabicamente();
        return $resultado;
    }

    public function _consultarPorId($id) {
        //consults by id

        if (!is_numeric($id)) {
            throw new EErroConsulta();
            
        } else {
            //nothing to do - skip to the next step function
            
        }
        $natureza = $this->naturezaDAO->consultarPorId($id);
        return $natureza;
    }

    public function _consultarPorNome($natureza) {
        //consults by name
        $natureza = $this->naturezaDAO->consultarPorNome($natureza);
        return $natureza;
    }

    public function _consultarPorIdCategoria($id) {
        //consults by id in cathegory
        return $this->naturezaDAO->consultarPorIdCategoria($id);
    }

    public function _inserirNatureza(Natureza $natureza) {
        //insert nature
        return $this->naturezaDAO->inserirNatureza($natureza);
    }

    public function _inserirArrayParse($arrayNatureza) {
        
        if (!is_array($arrayNatureza)) {
            throw new EFalhaNaturezaController();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        for ($i = 0, $arrayKey = $arrayNatureza, $inicio = 0; $i < count($arrayNatureza); $i++) {
            $chave = key($arrayKey);
            $categoriaDAO = new CategoriaDAO();
            $dadosCategoria = new Categoria();
            $dadosCategoria = $categoriaDAO->consultarPorNome($chave);
        
            for ($j = $inicio; $j < (count($arrayNatureza[$chave]) + $inicio); $j++) {
                $dadosNatureza = new Natureza();
                $dadosNatureza->__setNatureza($arrayNatureza[$chave][$j]);
                $dadosNatureza->__setIdCategoria($dadosCategoria->__getIdCategoria());
                $this->naturezaDAO->inserirNatureza($dadosNatureza);
            }
            
            $inicio = $inicio + count($arrayNatureza[$chave]);
            next($arrayKey);
            
        }
        return $dadosCategoria;
        
    }

    public function _retornarDadosDeNaturezaFormatado($natureza) {
        //returns formatted data
        $tempoDAO = new TempoDAO();
        $crimeCO = new CrimeController();
        $arrayDadosTempo = $tempoDAO->listarTodos();
        $dados;
        
        for ($i = 0; $i < count($arrayDadosTempo); $i++) {
            $dados['tempo'][$i] = $arrayDadosTempo[$i]->__getIntervalo();
            $dados['crime'][$i] = $crimeCO->_somaDeCrimePorNaturezaEmAno($natureza, $dados['tempo'][$i]);
            $dados['title'][$i] = number_format($dados['crime'][$i], 0, ',', '.');
        }
        return $dados;
        
    }

}
