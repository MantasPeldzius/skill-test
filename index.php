<?php

// Classes autoloder
require_once 'system/autoloader.php';
// Configuration for app
require_once 'system/configuration.php';

use Classes\Generator;
use Classes\Checker;
use Classes\Validator;

// Check if two parameters set and validate if numeric
$first_param = (isset($argv[1])) ? $argv[1] : false;
$second_param = (isset($argv[2])) ? $argv[2] : false;

if ($first_param === false || $second_param === false) {
    echo "Need two parameters.\n";
    die();
}

Validator::validateParameter($first_param);
Validator::validateParameter($second_param);
if (Validator::error()) {
    echo Validator::getErrorMessage() . "\n";
    die();
}

// Number generators with factor values
$A_generator = new Generator($first_param, 16807);
$B_generator = new Generator($second_param, 48271);

// Checker values form configuration
Checker::initialize($configuration['checker_start'], $configuration['checker_length']);

for ($i = 0; $i < $configuration['comparisons']; $i++) {
    Checker::compare($A_generator->getNextBinary(), $B_generator->getNextBinary());
}

echo Checker::getCounter() . "\n";
