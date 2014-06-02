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
include_once('C:/xampp/htdocs/mds2013/exceptions/EWrongConsult.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EFailKindController.php');

class KindController {

    private $kindCrimeConnectionDatabase;

    public function __construct() {
        /**
        * construct an object 
        * 
        * @param no parameters
        * @return no return        
        */
        $kindCrimeInstance->kindCrimeConnectionDatabase = new KindDAO();
    }

    public function __constructTeste() {
        /**
        * construct an object for test
        * 
        * @param no parameters
        * @return no return        
        */
        $kindCrimeInstance->kindCrimeConnectionDatabase->__constructTest();
    }

    public function _listarTodas() {
        /**
        * list all kinds
        * 
        * @param no parameters
        * @return a list of all kinds       
        */
        $resultSearchKindCrime = $kindCrimeInstance->kindCrimeConnectionDatabase->listAllAdministrativeRegion();

        return $resultSearchKindCrime;
    }

    public function _listarTodasAlfabicamente() {
        /**
        * list all kinds alphabetically
        * 
        * @param no parameters
        * @return a list of all kinds alphabetically     
        */
        $resultSearchKindCrime = $kindCrimeInstance->kindCrimeConnectionDatabase->listAllCategoriesAlphabetically();
        return $resultSearchKindCrime;
    }

    public function _consultarPorId($idKindCrime) {
        /**
        * search kind by its identifier
        * 
        * @param idKindCrime  identifier of kind
        * @return             the kind name searched      
        */

        if (!is_numeric($idKindCrime)) {
            throw new EWrongConsult();
            
        } else {
            //nothing to do - skip to the next step function
            
        }
        $kindCrimeName = $kindCrimeInstance->kindCrimeConnectionDatabase->consultAdministrativeRegionById($idKindCrime);
        return $kindCrimeName;
    }

    public function _consultarPorNome($kindCrimeName) {
        /**
        * search kind by its name
        * 
        * @param kindCrimeName  name of kind
        * @return               the kind name searched      
        */
        $kindCrimeName = $kindCrimeInstance->kindCrimeConnectionDatabase->consultAdministrativeRegionByName($kindCrimeName);
        return $kindCrimeName;
    }

    public function _consultarPorIdCategoria($idKindCrime) {
        /**
        * search kind by identifier category
        * 
        * @param idKindCrime    identifier of kind
        * @return               the kind name searched      
        */
        return $kindCrimeInstance->kindCrimeConnectionDatabase->consultarPorIdCategoria($idKindCrime);
    }

    public function _inserirNatureza(Kind $kindCrimeName) {
        /**
        * insert kind 
        * 
        * @param kindCrimeName    name of kind
        * @return                 the kind name inserted      
        */
        return $kindCrimeInstance->kindCrimeConnectionDatabase->inserirNatureza($kindCrimeName);
    }

    public function _inserirArrayParse($arrayKindCrime) {
        /**
        * insert kind 
        * 
        * @param arrayKindCrime   array of kinds
        * @return                 data category      
        */
        if (!is_array($arrayKindCrime)) {
            throw new EFailKindController();
        
        }else {
            //nothing to do - skip to the next step function
            
        }
        
        //variable i: runs natures contained in the array
        for ($i = 0, $arrayKey = $arrayKindCrime, $beginCount = 0; $i < count($arrayKindCrime); $i++) {
            $keyArrayKey = key($arrayKey);
            $categoryConnectionDatabase = new CategoryDAO();
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
        /**
        * return data kind formated
        * 
        * @param kindCrimeName    name of kind
        * @return                 data     
        */
        $timeConnectionDatabase = new TimeDAO();
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

