<?php
/*
 * Autoload Path
 */
require_once realpath(dirname(__FILE__)).'/../vendor/autoload.php';

/*
 * Autoload Agms Php Lite
 */
require_once realpath(dirname(__FILE__)).'/../lib/agms.php';

/*
 * Gateway Credentials
 */
Agms::setUsername('agmsdevdemo');
Agms::setPassword('nX1m*xa9Id');

Agms::setVerbose(false);
