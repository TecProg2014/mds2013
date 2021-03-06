<?php

/*
  File name: KindView.php
  File description: show and consult kind
 */
include_once('./controller/KindController.php');
include_once('./views/CategoryView.php');
include_once('./views/CrimeView.php');

class KindView {

    private $kindCrimeControlView;
    private $crimeControlView;

    public function __construct() {
        /**
        * constructor
        * 
        * @param      no parameters
        * @return     no return 
        */
        $instanceClass->kindCrimeControlView = new KindController();
        $instanceClass->crimeControlView = new CrimeController();
    }

    public function listarTodasAlfabicamente() {
        /**
        * list all kinds alphbetically
        * 
        * @param      no parameters
        * @return     array with kinds 
        */
        $allKindCrime = $instanceClass->kindCrimeControlView->_listarTodasAlfabicamente();
        
        //variable i: runs natures in the array
        for ($i = 0, $returnTypesKindCrime = ""; $i < count($allKindCrime); $i++) {
            $dataCrime = $instanceClass->crimeControlView->_somaDeCrimePorNatureza($allKindCrime[$i]->__getKind());
            $returnTypesKindCrime = $returnTypesKindCrime . "<h3>" . $allKindCrime[$i]->__getKind() . "</h3>
				<div class=\"progress\" title=\"" . number_format($dataCrime, 0, ',', '.') . "\">
				<div class=\"bar\" style=\"width: " . (100 * $dataCrime / 450000) . "%;\"></div>
				</div>";
        }

        return $returnTypesKindCrime;
    }

    public function consultarPorNome($kindCrimeName) {
         /**
        * consult kind by name
        * 
        * @param  kindCrimeName      name of kind
        * @return                    name of kind
        */
        $kindCrimeName = $instanceClass->kindCrimeControlView->_consultAdministrativeRegionByName($kindCrimeName);
        return $kindCrimeName->__getKind();
    }

    public function consultarPorId($idKindCrime) {
         /**
        * consult kind by its identifier
        * 
        * @param  idKindCrime        identifier of kind
        * @return                    name of kind
        */
        $kindCrimeName = $instanceClass->kindCrimeControlView->_consultAdministrativeRegionById($idKindCrime);
        return $kindCrimeName->__getKind();
    }

    public function consultarPorIdCategoria($idKindCrime) {
         /**
        * consult kind by identifier of category
        * 
        * @param  idKindCrime        identifier of kind
        * @return                    identifier of kind
        */
        return $instanceClass->kindCrimeControlView->_consultarPorIdCategoria($idKindCrime);
    }

    public function _retornarDadosDeNaturezaFormatado($kindCrimeName) {
         /**
        * return kind data formated
        * 
        * @param  kindCrimeName      name of kind
        * @return                    return name kind formated
        */
        $dataKindCrime = $instanceClass->kindCrimeControlView->_retornarDadosDeNaturezaFormatado($kindCrimeName);
        $formatedDataCrime = "";
        $returnFormated = "";
        
        //variable i: runs data nature in the array
        for ($i = 0; $i < count($dataKindCrime['title']); $i++) {
            /**
             * Laço que escreve os dados do grafico de ocorrencias por ano.
             * a string ("\"bar\"") define a barra cheia do grafico e
             * a string ("\"bar simple\"") define a barra pontilhada.
             * A condicional 'if($i%2==0)' garante que as barras pontilhadas e cheias sejam intercaladas.
             * Retorna-se o vetor de strings concatenado.
             * @author Eliseu
             * @copyright RadarCriminal 2013
             */
            if ($i % 2 == 0) {
                $slash = "\"bar\"";
                
            } else {
                $slash = "\"bar simple\"";
                
            }
            
            $formatedDataCrime[$i] = "
				<div class=" . $slash . " title=\"" . $dataKindCrime['title'][$i] . " Ocorrencias\">
					<div class=\"title\">" . $dataKindCrime['tempo'][$i] . "</div>
					<div class=\"value\">" . $dataKindCrime['crime'][$i] . "</div>
				</div>";
            $returnFormated .= $formatedDataCrime[$i];
        }
        return $returnFormated;
    }

    public function aposBarraLateral($idCategory) {
        /**
        * return kind data formated
        * 
        * @param  idCategory         identifier of kind
        * @return                    auxiliar slash
        */
        $categoryView = new CategoriaView();
        $crimeView = new CrimeView();
        $arrayCategories = $categoryView->listAllAlphabeticallyPure();
        $auxiliarCategories = $arrayCategories[$idCategory];
        $arrayKindCrime = $instanceClass->consultarPorIdCategoria($auxiliarCategories->__getIdCategory());
        
        //variable i: runs natures in the array
        for ($i = 0; $i < count($arrayKindCrime); $i++) {
            $actualKindCrime = $arrayKindCrime[$i];
            $auxiliarSlash[] = "
				<div class=\"row-fluid\">
		
				<div class=\"box span12\">
							<div class=\"box-header\">
								<h2><a href=\"#\" class=\"btn-minimize\"><i class=\"icon-tasks\"></i>" . $actualKindCrime->__getKind() . "</a></h2>
								<div class=\"box-icon\">
									<a href=\"#\" class=\"btn-close\"><i class=\"icon-remove\"></i></a>
								</div>
							</div>
							<div class=\"box-content\" style=\"display: none;\">
								<h3>Por Ano</h3></br>
									<div class=\"chart-natureza\">
									
									 " . $instanceClass->_retornarDadosDeNaturezaFormatado($actualKindCrime->__getKind()) . " </div>
									
		
							</div>
				</div>
		
				</div>";
        }
        
        return $auxiliarSlash;
    }

}


//</br><h3>Por Regiao Administrativa</h3></br>
//".$this->listarTodasAlfabicamente()."