<?php

use app\AppKernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__.'/../app/autoload.php';
require_once __DIR__.'/../app/AppKernel.php';

const ENV = 'dev';
const DEBUG = true;

if (DEBUG) {
    Debug::enable();
}

$kernel = new AppKernel(ENV, DEBUG);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
