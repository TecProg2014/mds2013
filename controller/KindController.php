<?php

/*
  File name: NaturezaController.php
  File description: insert, consult, show and sum some kind informations
 */

include_once('C:/xampp/htdocs/mds2013/persistence/KindDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/CategoryDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Kind.php');
include_once('C:/xampp/htdocs/mds2013/model/Category.php');
include_once('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EFalhaNaturezaController.php');

class NatureController {

    private $natureConnectionDatabase;

    public function __construct() {
        $natureInstance->natureConnectionDatabase = new NaturezaDAO();
    }

    public function __constructTeste() {
        //tests instance of naturezaDAO
        $natureInstance->natureConnectionDatabase->__constructTest();
    }

    public function _listarTodas() {
        //lists all
        $resultSearchNature = $natureInstance->natureConnectionDatabase->listAllAdministrativeRegion();

        return $resultSearchNature;
    }

    public function _listarTodasAlfabicamente() {
        //lists all alphabeticaly
        $resultSearchNature = $natureInstance->natureConnectionDatabase->listAllCategoriesAlphabetically();
        return $resultSearchNature;
    }

    public function _consultarPorId($idNature) {
        //consults by id

        if (!is_numeric($idNature)) {
            throw new EErroConsulta();
            
        } else {
            //nothing to do - skip to the next step function
            
        }
        $nature = $natureInstance->natureConnectionDatabase->consultAdministrativeRegionById($idNature);
        return $nature;
    }

    public function _consultarPorNome($natureName) {
        //consults by name
        $natureName = $natureInstance->natureConnectionDatabase->consultAdministrativeRegionByName($natureName);
        return $natureName;
    }

    public function _consultarPorIdCategoria($idNature) {
        //consults by id in cathegory
        return $natureInstance->natureConnectionDatabase->consultarPorIdCategoria($idNature);
    }

    public function _inserirNatureza(Natureza $natureName) {
        //insert nature
        return $natureInstance->natureConnectionDatabase->inserirNatureza($natureName);
    }

    public function _inserirArrayParse($arrayNatures) {
        
        if (!is_array($arrayNatures)) {
            throw new EFalhaNaturezaController();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        //variable i: runs natures contained in the array
        for ($i = 0, $arrayKey = $arrayNatures, $beginCount = 0; $i < count($arrayNatures); $i++) {
            $keyArrayKey = key($arrayKey);
            $categoryConnectionDatabase = new CategoriaDAO();
            $categoryData = new Category();
            $categoryData = $categoryConnectionDatabase->consultCategoryByName($keyArrayKey);
        
             //variable j: runs natures contained in the array to find he key array
            for ($j = $beginCount; $j < (count($arrayNatures[$keyArrayKey]) + $beginCount); $j++) {
                $natureData = new Natureza();
                $natureData->__setNatureza($arrayNatures[$keyArrayKey][$j]);
                $natureData->__setIdCategory($categoryData->__getIdCategory());
                $natureInstance->natureConnectionDatabase->inserirNatureza($natureData);
            }
            
            $beginCount = $beginCount + count($arrayNatures[$keyArrayKey]);
            next($arrayKey);
            
        }
        return $categoryData;
        
    }

    public function _retornarDadosDeNaturezaFormatado($natureName) {
        //returns formatted data
        $timeConnectionDatabase = new TempoDAO();
        $objectCrimeController = new CrimeController();
        $arrayDataTime = $timeConnectionDatabase->listarTodos();
        $data;
        
        //variable i: runs data time contained in the array
        for ($i = 0; $i < count($arrayDataTime); $i++) {
            $data['tempo'][$i] = $arrayDataTime[$i]->__getIntervalo();
            $data['crime'][$i] = $objectCrimeController->_somaDeCrimePorNaturezaEmAno($natureName, $data['tempo'][$i]);
            $data['title'][$i] = number_format($data['crime'][$i], 0, ',', '.');
        }
        return $data;
        
    }

}

