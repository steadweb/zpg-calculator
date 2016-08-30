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
        $parts = explode(' ', $equation);

        $value = 0;
        $values = [];
        $op = false;

        foreach($parts as $part) {

            if(is_numeric($part)) {
                $values[] = $part;
            } elseif(in_array($part, ['+', '-', '/', '*', '^'])) {
                $op = $part;
            }

            if(count($values) >= 2 && false !== $op) {
                switch($op) {
                    case '+':
                        $value = $this->add($values[0], $values[1]);
                        $values = [];
                        $values[] = $value;
                        break;

                    case '-':
                        $value = $this->subtract($values[0], $values[1]);
                        $values = [];
                        $values[] = $value;
                        break;

                    case '*':
                        $value = $this->multiply($values[0], $values[1]);
                        $values[] = $value;
                        break;

                    case '/':
                        $value = $this->divide($values[0], $values[1]);
                        $values = [];
                        $values[] = $value;
                        break;

                    case '^':
                        $value = $this->power($values[0], $values[1]);
                        $values = [];
                        $values[] = $value;
                        break;
                }
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
