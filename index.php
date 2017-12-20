<?php

use PVV\Application;
 
$loader = require( __DIR__ . '/vendor/autoload.php' );

$appication = new Application();
$appication->run();
