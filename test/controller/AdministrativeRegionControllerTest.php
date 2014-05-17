<?php

/*
  File name: AdministrativeRegionControllerTest.php
  File description: tests the class RegiaoAdministrativaControllerTeste using asserts.
 */

require_once('C:/xampp/htdocs/mds2013/controller/AdministrativeRegionController.php');
require_once('C:/xampp/htdocs/mds2013/model/AdministrativeRegion.php');

class AdministrativeRegionControllerTest extends PHPUnit_Framework_Testcase {

    public function testConstruct() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
    }

    public function testListarTodas() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
        $regionAdmInstance->assertNotEmpty($objectRegionAdmControl->_listAllAdministrativeRegions());
    }

    public function testListarTodasAlfabeticamente() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
        $regionAdmInstance->assertNotEmpty($objectRegionAdmControl->__listAlphabeticallyAllAdministrativeRegions());
    }

    public function testConsultarPorId() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativa', $objectRegionAdmControl->_consultAdministrativeRegionById(1));
    }

    public function testExceptionConsultarPorId() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
        $regionAdmInstance->setExpectedException('EErroConsulta');
        $objectRegionAdmControl->_consultAdministrativeRegionById('teste');
    }

    public function testConsultarPorNome() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativa', $objectRegionAdmControl->_consultAdministrativeRegionByName('N BAND'));
    }

    public function testExceptionConsultarPorNome() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
        $regionAdmInstance->setExpectedException('EErroConsulta');
        $objectRegionAdmControl->_consultAdministrativeRegionByName(1);
    }

    public function testContarRegistrosRA() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
        $regionAdmInstance->assertEquals(32, $objectRegionAdmControl->_countAdministrativeRegionsRegisters());
    }

    public function testInserirRA() {
        $objectRegionAdmControl = new AdministrativeRegionController();
        $objectRegionAdmControl->__constructTest();
        $regionAdmInstance->assertInstanceOf('ADORecordSet_empty', $objectRegionAdmControl->insertAdministrativeRegion(new AdministrativeRegion()));
        $regionAdmInstance->assertObjectHasAttribute('raDAO', $objectRegionAdmControl);
        $regionAdmInstance->assertInstanceOf('RegiaoAdministrativaController', $objectRegionAdmControl);
    }

}
