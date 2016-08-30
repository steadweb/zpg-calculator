<?php

namespace Steadweb\Calculator\Tests;

use Steadweb\Calculator\Calculator;

class SubtractionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    protected $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    /**
     * @dataProvider data
     */
    public function testAddition($equation, $expected)
    {
        $this->assertEquals($expected, $this->calculator->evaluate($equation));
    }

    public function data()
    {
        return array(
            array('1 - 1', 0),
            array('32 - 1 - 12 - 4 - 0', 15),
            array('120 - 1 - 1 - 4 + 2 + 100 - 5', 211),
        );
    }
}