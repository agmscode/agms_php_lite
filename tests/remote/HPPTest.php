<?php

require_once realpath(dirname(__FILE__)) . '/../TestHelper.php';
require_once realpath(dirname(__FILE__)) . '/../../vendor//phpunit/phpunit/src/Framework/TestCase.php';

class HPPTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        
    }

    public function testSuccessfulHPPGetHash()
    {
        $params = array(
            'TransactionType'=>  'sale',
            'Amount' => '20.00',
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'HPPFormat' =>  '1'
        );
        $result = Agms::hostedPayment($params);
        $this->assertTrue(is_string($result));
    }

    public function testSuccessfulHPPGetLink()
    {
        $params = array(
            'TransactionType'=>  'sale',
            'Amount' => '20.00',
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'HPPFormat' =>  '1'
        );
        $result = Agms::hostedPayment($params);
        $this->assertTrue(is_string($result));
    }
}