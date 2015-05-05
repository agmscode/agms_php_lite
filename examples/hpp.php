<?php

require '../lib/agms.php';

/*
 * Gateway Credentials
 */
Agms::setUsername('agmsdevdemo');
Agms::setPassword('nX1m*xa9Id');

/**
 *
 * A minimalist example of a quick $20 payment page with template 1
 *
 **/
$params = array(
    'TransactionType' => 'sale',
    'Amount' => '20.00',
    'FirstName' => 'John',
    'LastName' => 'Doe',
    'HPPFormat' => '1'
);
$result = Agms::hostedPayment($params);
echo "\n\n" . 'Quick $20 payment page: <a href="' . $result . '" target="_blank">' . $hpp->getLink() . "</a>\n\n";


