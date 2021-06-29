#!usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use App\Commands\CountCommand;
use Symfony\Component\Console\Application;

$operators = [
    '+' => 'AddCommand',
    '-' => 'SubtractCommand',
    'x' => 'MultiplyCommand',
    '/' => 'DivideCommand'
];

$app = new Application();
$app->add(new CountCommand());

$app->run();