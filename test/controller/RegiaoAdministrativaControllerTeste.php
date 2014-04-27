<?php

/*
  File name: RegiaoAdministrativaControllerTeste.php
  File description: tests the class RegiaoAdministrativaControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/RegiaoAdministrativaController.php');
require_once('C:/xampp/htdocs/mds2013/model/RegiaoAdministrativa.php');

class RegiaoAdministrativaControllerTeste extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
    }

    public function testListarTodas() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
        $region_adm_instance->assertNotEmpty($object_region_adm_control->_listAllAdministrativeRegions());
    }

    public function testListarTodasAlfabeticamente() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
        $region_adm_instance->assertNotEmpty($object_region_adm_control->__listAlphabeticallyAllAdministrativeRegions());
    }

    public function testConsultarPorId() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativa', $object_region_adm_control->_consultAdministrativeRegionById(1));
    }

    public function testExceptionConsultarPorId() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
        $region_adm_instance->setExpectedException('EErroConsulta');
        $object_region_adm_control->_consultAdministrativeRegionById('teste');
    }

    public function testConsultarPorNome() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativa', $object_region_adm_control->_consultAdministrativeRegionByName('N BAND'));
    }

    public function testExceptionConsultarPorNome() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
        $region_adm_instance->setExpectedException('EErroConsulta');
        $object_region_adm_control->_consultAdministrativeRegionByName(1);
    }

    public function testContarRegistrosRA() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
        $region_adm_instance->assertEquals(32, $object_region_adm_control->_countAdministrativeRegionsRegisters());
    }

    public function testInserirRA() {
        $object_region_adm_control = new RegiaoAdministrativaController();
        $object_region_adm_control->__constructTest();
        $region_adm_instance->assertInstanceOf('ADORecordSet_empty', $object_region_adm_control->insertAdministrativeRegion(new AdministrativeRegion()));
        $region_adm_instance->assertObjectHasAttribute('raDAO', $object_region_adm_control);
        $region_adm_instance->assertInstanceOf('RegiaoAdministrativaController', $object_region_adm_control);
    }

}
