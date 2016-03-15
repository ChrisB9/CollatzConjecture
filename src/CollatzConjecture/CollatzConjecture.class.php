<?php

namespace MathTest;

/**
* Some Math:
*  if a number n is even, then divide n by 2
*  else multiply with 3 and add 1 (or another odd number)
*  repeat until reaching 1
*/
class CollatzConjecture extends \Exception
{
    public static $steps;
    protected $adder;
    protected $number;
    protected $breakingCriteria;

    public function getNumber()
    {
        return $this->number;
    }
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }
    public function getBreakingCriteria()
    {
        return $this->breakingCriteria;
    }
    public function setBreakingCriteria($breakingCriteria)
    {
        $this->breakingCriteria = $breakingCriteria;
        return $this;
    }
    public function getAdder()
    {
        return $this->adder;
    }
    public function setAdder($adder)
    {
        if (!is_numeric($adder)) {
            throw new \Exception($adder . " is not a Number", 1);
        }
        if (!$this->isOdd($adder)) {
            throw new \Exception($adder. " must be odd!", 1);
        }
        if ($this->number % $adder != 0) {
            throw new \Exception($adder. " should be dividable through ". $this->number, 1);
        }
        $this->adder = $adder;
        return $this;
    }
    public function __construct($number, $adder, $breakingCriteria)
    {
        $this->setAdder($adder);
        $this->setNumber($number);
        if (!isset($breakingCriteria)) {
            $this->setBreakingCriteria(1);
        } else {
            $this->setBreakingCriteria($breakingCriteria);
        }
    }
    public function isOdd($number)
    {
        if ($number % 2 == 0) {
            return false;
        }
        return true;
    }
    public function isBreakingCriteria($number)
    {
        if ($number != $this->getBreakingCriteria()) {
            return true;
        }
        return false;
    }
    public function doTheMathWithThe($number)
    {
        if ($this->getNumber() == null) {
            if (!is_numeric($number)) {
                throw new \Exception($number . " is not a Number", 1);
            }
        } else {
            $number = $this->getNumber();
        }
        while ($this->isBreakingCriteria($number)) {
            $this->steps[] = $number;
            if ($this->isOdd($number)) {
                $number = 3*$number+$this->getAdder();
            } else {
                $number /= 2;
            }
        }
        return $this->steps;
    }
    public function isCatchedInLoop()
    {
        $temp = $this->steps[count($this->steps)-1];
        $pos = 0;
        for ($i=count($this->steps)-2; $i == 0; $i++) {
            if ($temp == $this->steps[$i]) {
                $pos = $i;
            }
        }
        return false;
    }
}
