<?php

namespace Steadweb\Calculator\Tests;

use Steadweb\Calculator\Calculator;

class AdditionTest extends \PHPUnit_Framework_TestCase
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
            array('1 + 1', 2),
            array('100 + 5', 105),
            array('7 + 14 + 9', 30),
            array('0 + 0 + 1 + 0', 1),
            array('0 + 1 + 4 - 2 - 4 + 10 * 2', 19),
        );
    }
}