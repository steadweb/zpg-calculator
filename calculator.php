<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Steadweb\Calculator\Calculator;

$calculator = new Calculator();

$equations = [
    // Simple
    '4 + 1 + 3 + 5', // 13
    '4 + 1 + 3 + 5 - 10', // 3
    '104 - 94', // 10
    '104 - 94 + 2 - 11', // 1

    '2 + 4 * 2', // 10
    '11 * 3', // 33
    '100 / 5', // 20
    '100 / 5 * 20', // 400
    '4 ^ 4', // 256

    '1 + 1 ­ 4 * 4 ^ 2 / 2' // -126
];

foreach($equations as $equation) {
    print "The answer to $equation = " . $calculator->evaluate($equation) . "\n";
}


