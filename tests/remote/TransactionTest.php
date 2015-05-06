<?php
require_once realpath(dirname(__FILE__)) . '/../TestHelper.php';
require_once realpath(dirname(__FILE__)) . '/../../vendor//phpunit/phpunit/src/Framework/TestCase.php';

class TransactionTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }


    public function testTransactionProcess()
    {
        $params = array(
            'TransactionType' => 'sale',
            'PaymentType' => 'creditcard',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220',
            'CVV' => '123'
        );
        $result = Agms::process($params);
        print $result;
        $this->assertTrue(is_array($result));
    }

    public function testSuccessfulSale()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals(1, $result['response_code']);
        $this->assertEquals("Approved", $result['response_message']);
    }

    public function testFailedSale()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals(2, $result['response_code']);
        $this->assertEquals("Declined", $result['response_message']);
    }

    public function testSuccessfulAuthorize()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals(1, $result['response_code']);
        $this->assertEquals("Approved", $result['response_message']);
    }

    public function testFailedAuthorize()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals(2, $result['response_code']);
        $this->assertEquals("Declined", $result['response_message']);
    }

    public function testSuccessfulCapture()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals(1, $result['response_code']);
        $this->assertEquals("Approved", $result['response_message']);

        $transaction_id = $result['transaction_id'];

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => $transaction_id
        );

        $result = Agms::process($params);
        $this->assertEquals(1, $result['response_code']);
        $this->assertEquals("Capture successful: Approved", $result['response_message']);
    }

    public function testPartialCapture()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals(1, $result['response_code']);
        $this->assertEquals("Approved", $result['response_message']);


        $transaction_id = $result['transaction_id'];

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => $transaction_id
        );

        $result = Agms::process($params);
        $this->assertEquals(1, $result['response_code']);
        $this->assertEquals("Capture successful: Approved", $result['response_message']);
    }

    public function testFailedCapture()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals(1, $result['response_code']);
        $this->assertEquals("Approved", $result['response_message']);

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => '123'
        );

        try {
            Agms::process($params);
        } catch (ResponseException $e) {
            $args =$e->getTrace();
            $args = $args[0]['args'][0];
            $this->assertEquals(10, (string) $args->STATUS_CODE);
            $this->assertEquals("Transaction ID is not valid. Please double check your Transaction ID", (string) $args->STATUS_MSG);
        }

    }

    public function testSuccessfulRefund()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "Approved");

        $transaction_id = $result['transaction_id'];

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => $transaction_id
        );

        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "refund successful: Approved");
    }

    public function testPartialRefund()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "Approved");

        $transaction_id = $result['transaction_id'];

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => $transaction_id
        );

        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "refund successful: Approved");
    }

    public function testFailedRefund()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "Approved");

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => '123'
        );

        try {
            Agms::process($params);
        } catch (ResponseException $e) {
            $args =$e->getTrace();
            $args = $args[0]['args'][0];
            $this->assertEquals(10, (string) $args->STATUS_CODE);
            $this->assertEquals("Transaction ID is not valid. Please double check your Transaction ID", (string) $args->STATUS_MSG);
        }
    }

    public function testSuccessfulVoid()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "Approved");

        $transaction_id = $result['transaction_id'];

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => $transaction_id
        );

        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "void successful: Approved");
    }


    public function testFailedVoid()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "Approved");

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => '123'
        );

        try {
            Agms::process($params);
        } catch (ResponseException $e) {
            $args =$e->getTrace();
            $args = $args[0]['args'][0];
            $this->assertEquals(10, (string) $args->STATUS_CODE);
            $this->assertEquals("Transaction ID is not valid. Please double check your Transaction ID", (string) $args->STATUS_MSG);
        }
    }

    public function testSuccessfulVerify()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220',
        );
        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "Approved");

        $transaction_id = $result['transaction_id'];

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => $transaction_id
        );

        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "void successful: Approved");
    }


    public function testFailedVerify()
    {
        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'CCNumber' => '4111111111111111',
            'CCExpDate' => '1220'
        );
        $result = Agms::process($params);
        $this->assertEquals($result['response_code'], 1);
        $this->assertEquals($result['response_message'], "Approved");

        $params = array(
            'TransactionType' => 'sale',
            'Amount' => '20.00',
            'TransactionID' => '123'
        );

        try {
            Agms::process($params);
        } catch (ResponseException $e) {
            $args =$e->getTrace();
            $args = $args[0]['args'][0];
            $this->assertEquals(10, (string) $args->STATUS_CODE);
            $this->assertEquals("Transaction ID is not valid. Please double check your Transaction ID", (string) $args->STATUS_MSG);
        }
    }
}