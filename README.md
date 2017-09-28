# ZPG - Calculator

Basic calculator to calculate simple and compound equations.

_Note: This project was created for a developer role at ZPG._

## Simple

These are easy to understand and calculate, they don't contain multiple operators and only have a left / right hand side values, with a single operator (i.e. `1 + 1`)

### Example

```
<?php

require_once(__DIR__ . '/vendor/autoload.php');
use Steadweb\Calculator\Calculator;

$calculator = new Calculator();

$equations = [
    // Simple
    '4 + 1', // 13,
    '4 ^ 4', // 256,
    '104 - 94', // 10,
    '11 * 3', // 33
    '100 / 5' // 20
];

foreach($equations as $equation) {
    print "The answer to $equation = " . $calculator->evaluate($equation) . "\n";
}
```

## Compounds

These equations conists of multiple values and operators. The order matters, and the idea of this application is to split each equation up into a simple one, evaluating then placing the value back into the array at the starting position where the equation started. The order of operators handled is `^`, `/`, `*`, `+`, then `-`.

### Example

```
<?php

require_once(__DIR__ . '/vendor/autoload.php');
use Steadweb\Calculator\Calculator;

$calculator = new Calculator();

$equations = [
    '4 + 1 + 3 + 5 - 10', // 3
    '104 - 94 + 2 - 11', // 1
    '2 + 4 * 2', // 10
    '100 / 5 * 20', // 400
];

foreach($equations as $equation) {
    print "The answer to $equation = " . $calculator->evaluate($equation) . "\n";
}
```

## Testing

Run the tests using the following command from the root of the project.

```
./vendor/bin/phpunit ./tests
```
