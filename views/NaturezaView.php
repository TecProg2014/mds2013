<?php

/*
  File name: NaturezaView.php
  File description: show and consult kind
  Authors: Lucas Andrade, Eduardo Augusto, S�rgio Bezerra, Lucas Carvalho, Eliseu
 */
include_once('./controller/NaturezaController.php');
include_once('./views/CategoriaView.php');
include_once('./views/CrimeView.php');

class NaturezaView {

    private $nature_control_view;
    private $crime_control_view;

    public function __construct() {
        $instance_class->nature_control_view = new NaturezaController();
        $instance_class->crime_control_view = new CrimeController();
    }

    public function listarTodasAlfabicamente() {
        $all_natures = $instance_class->nature_control_view->_listarTodasAlfabicamente();
        
        //variable i: runs natures in the array
        for ($i = 0, $return_types_natures = ""; $i < count($all_natures); $i++) {
            $data_crime = $instance_class->crime_control_view->_somaDeCrimePorNatureza($all_natures[$i]->__getNatureza());
            $return_types_natures = $return_types_natures . "<h3>" . $all_natures[$i]->__getNatureza() . "</h3>
				<div class=\"progress\" title=\"" . number_format($data_crime, 0, ',', '.') . "\">
				<div class=\"bar\" style=\"width: " . (100 * $data_crime / 450000) . "%;\"></div>
				</div>";
        }

        return $return_types_natures;
    }

    public function consultarPorNome($nature_name) {
        $nature_name = $instance_class->nature_control_view->_consultarPorNome($nature_name);
        return $nature_name->__getNatureza();
    }

    public function consultarPorId($id_nature) {
        $nature_name = $instance_class->nature_control_view->_consultarPorId($id_nature);
        return $nature_name->__getNatureza();
    }

    public function consultarPorIdCategoria($id_nature) {
        return $instance_class->nature_control_view->_consultarPorIdCategoria($id_nature);
    }

    public function _retornarDadosDeNaturezaFormatado($nature_name) {
        $data_nature = $instance_class->nature_control_view->_retornarDadosDeNaturezaFormatado($nature_name);
        $formated_data_crime = "";
        $return_formated = "";
        
        //variable i: runs data nature in the array
        for ($i = 0; $i < count($data_nature['title']); $i++) {
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
            
            $formated_data_crime[$i] = "
				<div class=" . $slash . " title=\"" . $data_nature['title'][$i] . " Ocorrencias\">
					<div class=\"title\">" . $data_nature['tempo'][$i] . "</div>
					<div class=\"value\">" . $data_nature['crime'][$i] . "</div>
				</div>";
            $return_formated .= $formated_data_crime[$i];
        }
        return $return_formated;
    }

    public function aposBarraLateral($id_category) {

        $category_view = new CategoriaView();
        $crime_view = new CrimeView();
        $array_categories = $category_view->listarTodasAlfabeticamentePuro();
        $auxiliar_categories = $array_categories[$id_category];
        $array_natures = $instance_class->consultarPorIdCategoria($auxiliar_categories->__getIdCategoria());
        
        //variable i: runs natures in the array
        for ($i = 0; $i < count($array_natures); $i++) {
            $actual_nature = $array_natures[$i];
            $auxiliar_slash[] = "
				<div class=\"row-fluid\">
		
				<div class=\"box span12\">
							<div class=\"box-header\">
								<h2><a href=\"#\" class=\"btn-minimize\"><i class=\"icon-tasks\"></i>" . $actual_nature->__getNatureza() . "</a></h2>
								<div class=\"box-icon\">
									<a href=\"#\" class=\"btn-close\"><i class=\"icon-remove\"></i></a>
								</div>
							</div>
							<div class=\"box-content\" style=\"display: none;\">
								<h3>Por Ano</h3></br>
									<div class=\"chart-natureza\">
									
									 " . $instance_class->_retornarDadosDeNaturezaFormatado($actual_nature->__getNatureza()) . " </div>
									
		
							</div>
				</div>
		
				</div>";
        }
        return $auxiliar_slash;
    }

}


//</br><h3>Por Regiao Administrativa</h3></br>
//".$this->listarTodasAlfabicamente()."