<?php

namespace Steadweb\Calculator\Operators;

use Steadweb\Calculator\OperatorInterface;

final class Multiplication implements OperatorInterface
{
    /**
     * @var int
     */
    private $a;

    /**
     * @var int
     */
    private $b;

    /**
     * Addition constructor.
     *
     * @param $a
     * @param $b
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * Returns an evaluated equation.
     *
     * @return int
     */
    public function evaluate()
    {
        return (int) $this->a * (int) $this->b;
    }
}