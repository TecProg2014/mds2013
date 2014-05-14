<?php

/*
  File name: KindController.php
  File description: insert, consult, show and sum some kind informations
 */

include_once('C:/xampp/htdocs/mds2013/persistence/KindDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/CategoryDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Kind.php');
include_once('C:/xampp/htdocs/mds2013/model/Category.php');
include_once('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EFalhaNaturezaController.php');

class KindController {

    private $kindCrimeConnectionDatabase;

    public function __construct() {
        $kindCrimeInstance->kindCrimeConnectionDatabase = new KindDAO();
    }

    public function __constructTeste() {
        //tests instance of naturezaDAO
        $kindCrimeInstance->kindCrimeConnectionDatabase->__constructTest();
    }

    public function _listarTodas() {
        //lists all
        $resultSearchKindCrime = $kindCrimeInstance->kindCrimeConnectionDatabase->listAllAdministrativeRegion();

        return $resultSearchKindCrime;
    }

    public function _listarTodasAlfabicamente() {
        //lists all alphabeticaly
        $resultSearchKindCrime = $kindCrimeInstance->kindCrimeConnectionDatabase->listAllCategoriesAlphabetically();
        return $resultSearchKindCrime;
    }

    public function _consultarPorId($idKindCrime) {
        //consults by id

        if (!is_numeric($idKindCrime)) {
            throw new EErroConsulta();
            
        } else {
            //nothing to do - skip to the next step function
            
        }
        $kindCrimeName = $kindCrimeInstance->kindCrimeConnectionDatabase->consultAdministrativeRegionById($idKindCrime);
        return $kindCrimeName;
    }

    public function _consultarPorNome($kindCrimeName) {
        //consults by name
        $kindCrimeName = $kindCrimeInstance->kindCrimeConnectionDatabase->consultAdministrativeRegionByName($kindCrimeName);
        return $kindCrimeName;
    }

    public function _consultarPorIdCategoria($idKindCrime) {
        //consults by id in cathegory
        return $kindCrimeInstance->kindCrimeConnectionDatabase->consultarPorIdCategoria($idKindCrime);
    }

    public function _inserirNatureza(Kind $kindCrimeName) {
        //insert nature
        return $kindCrimeInstance->kindCrimeConnectionDatabase->inserirNatureza($kindCrimeName);
    }

    public function _inserirArrayParse($arrayKindCrime) {
        
        if (!is_array($arrayKindCrime)) {
            throw new EFalhaNaturezaController();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        //variable i: runs natures contained in the array
        for ($i = 0, $arrayKey = $arrayKindCrime, $beginCount = 0; $i < count($arrayKindCrime); $i++) {
            $keyArrayKey = key($arrayKey);
            $categoryConnectionDatabase = new CategoriaDAO();
            $categoryData = new Category();
            $categoryData = $categoryConnectionDatabase->consultCategoryByName($keyArrayKey);
        
             //variable j: runs natures contained in the array to find he key array
            for ($j = $beginCount; $j < (count($arrayKindCrime[$keyArrayKey]) + $beginCount); $j++) {
                $kindCrimeData = new Kind();
                $kindCrimeData->__setNatureza($arrayKindCrime[$keyArrayKey][$j]);
                $kindCrimeData->__setIdCategory($categoryData->__getIdCategory());
                $kindCrimeInstance->kindCrimeConnectionDatabase->inserirNatureza($kindCrimeData);
            }
            
            $beginCount = $beginCount + count($arrayKindCrime[$keyArrayKey]);
            next($arrayKey);
            
        }
        return $categoryData;
        
    }

    public function _retornarDadosDeNaturezaFormatado($kindCrimeName) {
        //returns formatted data
        $timeConnectionDatabase = new TempoDAO();
        $objectCrimeController = new CrimeController();
        $arrayDataTime = $timeConnectionDatabase->listarTodos();
        $data;
        
        //variable i: runs data time contained in the array
        for ($i = 0; $i < count($arrayDataTime); $i++) {
            $data['tempo'][$i] = $arrayDataTime[$i]->__getIntervalo();
            $data['crime'][$i] = $objectCrimeController->_somaDeCrimePorNaturezaEmAno($kindCrimeName, $data['tempo'][$i]);
            $data['title'][$i] = number_format($data['crime'][$i], 0, ',', '.');
        }
        return $data;
        
    }

}

