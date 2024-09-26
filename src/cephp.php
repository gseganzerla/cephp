#!/usr/local/bin/php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Factories\CepServiceFactory;
use App\Infrastructure\Commands\Symfony\CepCommand;
use Symfony\Component\Console\Application;

$application = new Application('CEPHP', '0.0.1');


$application->add(new CepCommand(CepServiceFactory::create()));

$application->run();