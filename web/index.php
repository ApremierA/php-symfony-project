<?php

use app\AppKernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

$loader = include_once __DIR__.'/../app/autoload.php';
require_once __DIR__.'/../app/AppKernel.php';

// FIXME: Workaround for built-in server
$_SERVER['SYMFONY__SECRET'] = getenv('SYMFONY__SECRET');

$env = getenv('SYMFONY__ENV') ?: 'dev';
$debug = (int) getenv('SYMFONY__DEBUG') === 1;
if ($debug) {
    Debug::enable();
}

$kernel = new AppKernel($env, $debug);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
