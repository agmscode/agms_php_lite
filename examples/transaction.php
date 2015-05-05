<?php

require '../lib/agms.php';

/*
 * Gateway Credentials
 */
Agms::setUsername('agmsdevdemo');
Agms::setPassword('nX1m*xa9Id');

/**
 *
 * A minimalist example of a processed transaction
 *
 **/
$params = array(
    'TransactionType' => 'sale',
    'Amount' => '20.00',
    'CCNumber' => '4111111111111111',
    'CCExpDate' => '1220',
);

$result = Agms::process($params);
var_dump($result);


/**
 *
 * A decline
 *
 **/
$params = array(
    'TransactionType' => 'sale',
    'Amount' => '0.01',
    'CCNumber' => '4111111111111111',
    'CCExpDate' => '1220',
);

$result = Agms::process($params);
var_dump($result);

/**
 *
 * A FULL example of a processed transaction
 *
 **/
$params = array(
    'TransactionType' => 'sale',
    'Amount' => '20.00',
    'TaxAmount' => '2.00',
    'ShippingAmount' => '3.00',
    'OrderDescription' => 'big transaction detail test',
    'OrderID' => '1AFSS224',
    'PONumber' => '256645',
    'FirstName' => 'Joe',
    'LastName' => 'Smith',
    'CompanyName' => 'Smith Enterprises',
    'Address' => '125 Main St',
    'Address2' => 'Suite C',
    'City' => 'Blaine',
    'State' => 'MN',
    'Zip' => '55443',
    'Country' => 'US',
    'Phone' => '222-222-2222',
    'Fax' => '333-333-3333',
    'Email' => 'joe@smith.com',
    'Website' => 'www.smith.com',
    'ShippingFirstName' => 'Joe',
    'ShippingLastName' => 'Smith',
    'ShippingCompanyName' => 'Smith Enterprises',
    'ShippingAddress' => '125 Main St',
    'ShippingAddress2' => 'Suite C',
    'ShippingCity' => 'Blaine',
    'ShippingState' => 'MN',
    'ShippingZip' => '55443',
    'ShippingCountry' => 'US',
    'ShippingEmail' => 'joe@smith.com',
    'ShippingPhone' => '444-444-4444',
    'ShippingFax' => '555-555-5555',
    'ShippingCarrier' => 'ups',
    'IPAddress' => '128.101.101.101',
    'ShippingTrackingNumber' => '1Z223452433282822',
    'CustomField1' => 'custom 1',
    'CustomField2' => 'custom 2',
    'CustomField3' => 'custom 3',
    'CustomField4' => 'custom 4',
    'CustomField5' => 'custom 5',
    'CustomField6' => 'custom 6',
    'CustomField7' => 'custom 7',
    'CustomField8' => 'custom 8',
    'CustomField9' => 'custom 9',
    'CustomField10' => 'custom 10',
    'CCNumber' => '4111111111111111',
    'CCExpDate' => '1220',
);
$result = Agms::process($params);
var_dump($result);
