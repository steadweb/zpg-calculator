<?php

namespace Steadweb\Calculator\Tests;

use Steadweb\Calculator\Calculator;

class MultiplicationTest extends \PHPUnit_Framework_TestCase
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
            array('100 / 5 * 20', 400),
        );
    }
}