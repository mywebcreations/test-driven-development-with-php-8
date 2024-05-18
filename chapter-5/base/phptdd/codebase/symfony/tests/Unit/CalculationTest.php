<?php

namespace App\Tests\Unit;

use App\Example\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    public function testCanCalculateTotal(): void
    {
        $expectedTotal = 6;
        $a = 1;
        $b = 2;
        $c = 3;
        $calculator = new Calculator();
        $total = $calculator->calculateTotal($a, $b, $c);
        self::assertEquals(
            expected: $expectedTotal, 
            actual: $total,
            message: 'Expected total is 6'            
        );
    }

    public function testCanAdd(): void
    {
        $expectedTotal = 10;
        $a = 7;
        $b = 3;
        $calculator = new Calculator();
        $total = $calculator->add($a, $b);
        self::assertEquals(
            expected: $expectedTotal,
            actual: $total,
            message: 'Expected total is 10'
        );
    }

    public function testCanSubtract(): void
    {
        $expectedDiff = 7;
        $a = 13;
        $b = 6;
        $calculator = new Calculator();
        $actualDiff = $calculator->subtract($a, $b);
        self::assertEquals(
            expected: $expectedDiff,
            actual: $actualDiff
        );


    }

    /**
     * Testing a private method in the Calculator class
     */
    // public function testCanGetDifference(): void
    // {
    //     $expectedDiff = 4;
    //     $a = 10;
    //     $b = 6;

    //     //Reflection method to test private method.
    //     $calculatorClass = new \ReflectionClass(Calculator::class);
    //     $privateMethod = $calculatorClass->getMethod("getDifference");
    //     $privateMethod->setAccessible(true);

    //     //now Instance the class
    //     $calculator = new Calculator();

    //     //call the private method
    //     $difference = $privateMethod->invokeArgs($calculator, [$a, $b]);
        
    //     self::assertEquals(
    //         expected: $expectedDiff,
    //         actual: $difference
    //     );
    // }



}