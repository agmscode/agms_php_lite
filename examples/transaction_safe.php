<?php

require '../lib/agms.php';

/*
 * Gateway Credentials
 */
Agms::setUsername('osdgithub');
Agms::setPassword('Ks1m32aF@');

/**
 *
 * An example of adding a SAFE entry
 *
 **/
$params = array(
    'PaymentType' => 'creditcard',
    'SAFE_Action' => 'add_safe',
    'FirstName' => 'test first',
    'LastName' => 'test last',
    'CCNumber' => '4111111111111111',
    'CCExpDate' => '1220'
);

$result = Agms::process($params);

$safe_id = $result['SAFE_ID'];

/**
 *
 * An example of updating that new SAFE entry
 *
 **/
$params = array(
    'SAFE_ID' => $safe_id,
    'SAFE_Action' => 'update_safe',
    'FirstName' => 'test first updated',
    'LastName' => 'test last updated',
);

$result = Agms::process($params);
var_dump($result);

/**
 *
 * An example of deleting that new SAFE entry
 *
 **/
$params = array(
    'SAFE_ID' => $safe_id,
    'SAFE_Action' => 'delete_safe',
);
$result = Agms::process($params);
var_dump($result);