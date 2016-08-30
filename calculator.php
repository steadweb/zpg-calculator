<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Steadweb\Calculator\Calculator;

$calculator = new Calculator();

$equations = [
    '4 + 1',
    '104 - 94',
    '11 * 3',
    '100 / 5',
    '4 ^ 4'
];

foreach($equations as $equation) {
    print "The answer to $equation = " . $calculator->evaluate($equation) . "\n";
}


