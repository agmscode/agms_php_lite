# agms_php_lite
Agms Php Lite Library

[![Build Status](https://travis-ci.org/agmscode/agms_php_lite.svg?branch=master)](https://travis-ci.org/agmscode/agms_php_lite)
[![Latest Stable Version](https://poser.pugx.org/agmscode/agms_php_lite/v/stable)](https://packagist.org/packages/agmscode/agms_php_lite)
[![Total Downloads](https://poser.pugx.org/agmscode/agms_php_lite/downloads)](https://packagist.org/packages/agmscode/agms_php_lite)
[![Latest Unstable Version](https://poser.pugx.org/agmscode/agms_php_lite/v/unstable)](https://packagist.org/packages/agmscode/agms_php_lite)
[![License](https://poser.pugx.org/agmscode/agms_php_lite/license)](https://packagist.org/packages/agmscode/agms_php_lite)

## Requirements

PHP 5.1 and later.

## Installation

Download the [latest release](https://github.com/agmscode/agms_php_lite/releases). Then, include the `agms.php` file.

    require_once('/path/to/agms_php_lite/agms.php');

## Getting Started

Simple usage looks like:

    Agms::setUsername('your username');
    Agms::setPassword('your password');
    $params = array(
        'TransactionType' => 'sale'
        'CCNumber' => '4111111111111111',
        'CC_exp_date' => '1220',
        'CVV' => 123,
        'Amount' => '20'
    );
    $response = Agms::process($params);
    echo $response;

## Documentation

Please see http://onlinepaymentprocessing.com/docs/ for up-to-date documentation.


## Tests

In order to run tests first install [PHPUnit](http://packagist.org/packages/phpunit/phpunit) via [Composer](http://getcomposer.org/):

    composer update --dev

To run the test suite:

    ./vendor/bin/phpunit
