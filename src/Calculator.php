<?php

namespace Steadweb\Calculator;

use Steadweb\Calculator\Operators\Addition;
use Steadweb\Calculator\Operators\Division;
use Steadweb\Calculator\Operators\Multiplication;
use Steadweb\Calculator\Operators\Power;
use Steadweb\Calculator\Operators\Subtraction;

final class Calculator
{
    /**
     * Evaluates an equation.
     *
     * @param $equation
     * @return string
     */
    public function evaluate($equation)
    {
        $chunks = array_chunk(explode(' ', $equation), 3);

        $value = 0;

        foreach($chunks  as $parts) {
            switch($parts[1]) {
                case '+':
                    $value = $this->add($parts[0], $parts[2]);
                    break;

                case '-':
                    $value = $this->subtract($parts[0], $parts[2]);
                    break;

                case '*':
                    $value = $this->multiply($parts[0], $parts[2]);
                    break;

                case '/':
                    $value = $this->divide($parts[0], $parts[2]);
                    break;

                case '^':
                    $value = $this->power($parts[0], $parts[2]);
                    break;
            }
        }

        return $value;
    }

    private function add($a, $b)
    {
        return (new Addition($a, $b))->evaluate();
    }

    private function divide($a, $b)
    {
        return (new Division($a, $b))->evaluate();
    }

    private function multiply($a, $b)
    {
        return (new Multiplication($a, $b))->evaluate();
    }

    private function subtract($a, $b)
    {
        return (new Subtraction($a, $b))->evaluate();
    }

    private function power($a, $b)
    {
        return (new Power($a, $b))->evaluate();
    }
}
