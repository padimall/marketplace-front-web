<?php

include('vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
    
$log = new Logger('name');
$log->pushHandler(new StreamHandler('example.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');