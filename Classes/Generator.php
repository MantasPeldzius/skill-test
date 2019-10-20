<?php

namespace Classes;

class Generator
{
    
    private $number = null;
    private $factor = null;
    private $division = null;
    
    /**
     * Numbers generator
     * 
     * @param int $number starting number
     * @param int $factor multiplication factor
     */
    
    public function __construct($number, $factor, $division = 2147483647)
    {
        $this->number = $number;
        $this->factor = $factor;
        $this->division = $division;
    }
    
    private function generateNumber()
    {
        $this->number = ($this->number * $this->factor) % $this->division;
    }
    
    public function  getNextBinary()
    {
        $this->generateNumber();
        $binary = decbin($this->number);
        // zero fill string to 32 characters long
        $binary = sprintf("%032s", $binary);
        return $binary;
    }
}

