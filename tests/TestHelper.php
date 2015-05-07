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
Agms::setUsername('osdgithub');
Agms::setPassword('Ks1m32aF@');

Agms::setVerbose(false);
