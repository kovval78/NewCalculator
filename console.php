#!usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\CountCommand;

$app = new Application();
$app->add(new CountCommand());

$app->run();
