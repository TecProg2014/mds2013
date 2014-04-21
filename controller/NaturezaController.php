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

    private $nature_connection_database;

    public function __construct() {
        $nature_instance->nature_connection_database = new NaturezaDAO();
    }

    public function __constructTeste() {
        //tests instance of naturezaDAO
        $nature_instance->nature_connection_database->__constructTeste();
    }

    public function _listarTodas() {
        //lists all
        $result_search_nature = $nature_instance->nature_connection_database->listarTodas();

        return $result_search_nature;
    }

    public function _listarTodasAlfabicamente() {
        //lists all alphabeticaly
        $result_search_nature = $nature_instance->nature_connection_database->listarTodasAlfabicamente();
        return $result_search_nature;
    }

    public function _consultarPorId($id_nature) {
        //consults by id

        if (!is_numeric($id_nature)) {
            throw new EErroConsulta();
            
        } else {
            //nothing to do - skip to the next step function
            
        }
        $natureza = $nature_instance->nature_connection_database->consultarPorId($id);
        return $natureza;
    }

    public function _consultarPorNome($nature_name) {
        //consults by name
        $nature_name = $nature_instance->nature_connection_database->consultarPorNome($nature_name);
        return $nature_name;
    }

    public function _consultarPorIdCategoria($id_nature) {
        //consults by id in cathegory
        return $nature_instance->nature_connection_database->consultarPorIdCategoria($id_nature);
    }

    public function _inserirNatureza(Natureza $nature_name) {
        //insert nature
        return $nature_instance->nature_connection_database->inserirNatureza($nature_name);
    }

    public function _inserirArrayParse($array_natures) {
        
        if (!is_array($array_natures)) {
            throw new EFalhaNaturezaController();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        //variable i: runs natures contained in the array
        for ($i = 0, $arrayKey = $array_natures, $begin_count = 0; $i < count($array_natures); $i++) {
            $key_array_key = key($arrayKey);
            $category_connection_database = new CategoriaDAO();
            $category_data = new Categoria();
            $category_data = $category_connection_database->consultarPorNome($key_array_key);
        
             //variable j: runs natures contained in the array to find he key array
            for ($j = $begin_count; $j < (count($array_natures[$key_array_key]) + $begin_count); $j++) {
                $nature_data = new Natureza();
                $nature_data->__setNatureza($array_natures[$key_array_key][$j]);
                $nature_data->__setIdCategoria($category_data->__getIdCategoria());
                $nature_instance->nature_connection_database->inserirNatureza($nature_data);
            }
            
            $inicio = $inicio + count($array_natures[$key_array_key]);
            next($arrayKey);
            
        }
        return $category_data;
        
    }

    public function _retornarDadosDeNaturezaFormatado($nature_name) {
        //returns formatted data
        $time_connection_database = new TempoDAO();
        $object_crime_controller = new CrimeController();
        $array_data_time = $time_connection_database->listarTodos();
        $data;
        
        //variable i: runs data time contained in the array
        for ($i = 0; $i < count($array_data_time); $i++) {
            $data['tempo'][$i] = $array_data_time[$i]->__getIntervalo();
            $data['crime'][$i] = $object_crime_controller->_somaDeCrimePorNaturezaEmAno($nature_name, $data['tempo'][$i]);
            $data['title'][$i] = number_format($data['crime'][$i], 0, ',', '.');
        }
        return $data;
        
    }

}

