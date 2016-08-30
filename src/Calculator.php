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

        // Handle higher precedence operators first.
        foreach(['^', '/', '*'] as $higherPrecedenceOperator) {
            while(in_array($higherPrecedenceOperator, $parts)) {

                $lhsKey = array_search($higherPrecedenceOperator, $parts)-1;
                $lhs = $parts[$lhsKey];

                $rhsKey = array_search($higherPrecedenceOperator, $parts)+1;
                $rhs = $parts[$rhsKey];

                $operatorKey = array_search($higherPrecedenceOperator, $parts);

                unset($parts[$lhsKey]);
                unset($parts[$rhsKey]);
                unset($parts[$operatorKey]);

                $parts[$lhsKey] = $this->calc($lhs, $higherPrecedenceOperator, $rhs);

                ksort($parts);

                $parts = array_values($parts);
            }
        }

        // Already solved if the equation was simple.
        if(count($parts) === 1) {
            return current($parts);
        }

        // Work out the rest
        foreach($parts as $part) {

            if(is_numeric($part)) {
                $values[] = $part;
            } elseif(in_array($part, ['+', '-', '/', '*', '^'])) {
                $op = $part;
            }

            if(count($values) >= 2 && false !== $op) {
                $value = $this->calc($values[0], $op, $values[1]);
                $values = [];
                $values[] = $value;
            }
        }

        return $value;
    }

    /**
     * Calculates the the equation.
     *
     * E.g. 1 + 1
     *
     * @param $lhs
     * @param $op
     * @param $rhs
     *
     * @return int
     */
    private function calc($lhs, $op, $rhs)
    {
        switch($op) {
            case '+':
                return $this->add($lhs, $rhs);

            case '-':
                return $this->subtract($lhs, $rhs);

            case '*':
                return $this->multiply($lhs, $rhs);

            case '/':
                return $this->divide($lhs, $rhs);

            case '^':
                return $this->power($lhs, $rhs);
        }
    }

    /**
     * Proxy method for Addition::evaluate($a, $b)
     *
     * @param $a
     * @param $b
     * @return int
     */
    private function add($a, $b)
    {
        return (new Addition($a, $b))->evaluate();
    }

    /**
     * Proxy method for Division::evaluate($a, $b)
     *
     * @param $a
     * @param $b
     * @return int
     */
    private function divide($a, $b)
    {
        return (new Division($a, $b))->evaluate();
    }

    /**
     * Proxy method for Multiply::evaluate($a, $b)
     *
     * @param $a
     * @param $b
     * @return int
     */
    private function multiply($a, $b)
    {
        return (new Multiplication($a, $b))->evaluate();
    }

    /**
     * Proxy method for Subtraction::evaluate($a, $b)
     *
     * @param $a
     * @param $b
     * @return int
     */
    private function subtract($a, $b)
    {
        return (new Subtraction($a, $b))->evaluate();
    }

    /**
     * Proxy method for Power::evaluate($a, $b)
     *
     * @param $a
     * @param $b
     * @return int
     */
    private function power($a, $b)
    {
        return (new Power($a, $b))->evaluate();
    }
}
