<?php

use PVV\Application;
 
$loader = require( __DIR__ . '/vendor/autoload.php' );
$loader->addPsr4( 'PVV\\', __DIR__ . '/src/' );

$appication = new Application();
$appication->run();
