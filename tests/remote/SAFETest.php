<?php
require_once realpath(dirname(__FILE__)) . '/../TestHelper.php';
require_once realpath(dirname(__FILE__)) . '/../../vendor//phpunit/phpunit/src/Framework/TestCase.php';

class SAFETest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }


    public function testSuccessfulSafeAdd()
    {
        $params = array(
            'PaymentType' => 'creditcard',
            'SAFE_Action' => 'add_safe',
            'FirstName' => 'test first',
            'LastName' => 'test last',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::addToSafe($params);
        $this->assertEquals(1, $result['STATUS_CODE']);
        $this->assertEquals("SAFE Record added successfully. No transaction processed.", $result['STATUS_MSG']);
    }

    public function testFailedSafeAdd()
    {
        $params = array(
            'SAFE_Action' => 'add_safe',
            'FirstName' => 'test first',
            'LastName' => 'test last',
            'CCNumber' => '4111111111111111',

        );
        $result = Agms::addToSafe($params);
        $this->assertEquals(3, $result['STATUS_CODE']);
        $this->assertEquals("SAFE Record failed to add successfully.  No transaction processed. Adding a SAFE record of type 'creditcard' requires a CCExpDate|", $result['STATUS_MSG']);
    }


    public function testSuccessfulSafeUpdate()
    {
        $params = array(
            'PaymentType' => 'creditcard',
            'SAFE_Action' => 'add_safe',
            'FirstName' => 'test first',
            'LastName' => 'test last',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::addToSafe($params);
        $this->assertEquals(1, $result['STATUS_CODE']);
        $this->assertEquals("SAFE Record added successfully. No transaction processed.", $result['STATUS_MSG']);

        $safe_id = $result['SAFE_ID'];

        $params = array(
            'SAFE_ID' => $safe_id,
            'SAFE_Action' => 'update_safe',
            'FirstName' => 'test first updated',
            'LastName' => 'test last updated',
            'PaymentType' => 'creditcard',
        );

        $result = Agms::updateSafe($params);
        // $this->assertEquals(1, $result['STATUS_CODE']);
        // $this->assertEquals("SAFE Record updated successfully. No transaction processed.", $result['STATUS_MSG']);
    }



    public function testFailedSafeUpdate()
    {
        $params = array(
            'PaymentType' => 'creditcard',
            'SAFE_Action' => 'add_safe',
            'FirstName' => 'test first',
            'LastName' => 'test last',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::addToSafe($params);
        $this->assertEquals(1, $result['STATUS_CODE']);
        $this->assertEquals("SAFE Record added successfully. No transaction processed.", $result['STATUS_MSG']);

        $safe_id = $result['SAFE_ID'];

        $params = array(
            'SAFE_ID' => '123',
            'SAFE_Action' => 'update_safe',
            'FirstName' => 'test first updated',
            'LastName' => 'test last updated',
            'PaymentType' => 'creditcard',
        );

        $result = Agms::updateSafe($params);
        $this->assertEquals(3, $result['STATUS_CODE']);
        $this->assertEquals("SAFE Record failed to update successfully.  No transaction processed. ", $result['STATUS_MSG']);
    }

    public function testSuccessfulSafeDelete()
    {
        $params = array(
            'PaymentType' => 'creditcard',
            'SAFE_Action' => 'add_safe',
            'FirstName' => 'test first',
            'LastName' => 'test last',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::addToSafe($params);
        $this->assertEquals(1, $result['STATUS_CODE']);
        $this->assertEquals("SAFE Record added successfully. No transaction processed.", $result['STATUS_MSG']);

        $safe_id = $result['SAFE_ID'];

        $params = array(
            'SAFE_ID' => $safe_id,
            'SAFE_Action' => 'delete_safe',
        );

        $result = Agms::deleteFromSafe($params);
        $this->assertEquals(1, $result['STATUS_CODE']);
        $this->assertEquals("SAFE record has been deactivated", $result['STATUS_MSG']);
    }


    public function testFailedSafeDelete()
    {
        $params = array(
            'PaymentType' => 'creditcard',
            'SAFE_Action' => 'add_safe',
            'FirstName' => 'test first',
            'LastName' => 'test last',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::addToSafe($params);
        $this->assertEquals(1, $result['STATUS_CODE']);
        $this->assertEquals("SAFE Record added successfully. No transaction processed.", $result['STATUS_MSG']);

        $safe_id = $result['SAFE_ID'];

        $params = array(
            'SAFE_ID' => '123',
            'SAFE_Action' => 'delete_safe',
        );

        $result = Agms::deleteFromSafe($params);
        $this->assertEquals(2, $result['STATUS_CODE']);
        $this->assertEquals("SAFE record failed to deactivate", $result['STATUS_MSG']);
    }


}