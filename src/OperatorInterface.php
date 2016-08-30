<?php

namespace Steadweb\Calculator;

interface OperatorInterface
{
    /**
     * Returns an evaluated equation.
     *
     * @return string
     */
    public function evaluate();
}