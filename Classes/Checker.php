<?php

namespace Classes;

/**
 * Checker
 * 
 * Compares parts of two strings and tracks count
 * 
 */

class Checker
{
    private static $initialized = false;
    private static $counter = 0;
    private static $start = 0;
    private static $length = false;
    
    public static function initialize($start, $length = false)
    {
        if (self::$initialized === true) {
            return;
        } else {
            self::$start = $start;
            self::$length = $length;
            self::$initialized = true;
        }
    }
    
    public static function compare($a, $b)
    {
        if (self::$length === false) {
            if (substr($a, self::$start) === substr($b, self::$start)) {
                self::$counter++;
            }
        } else {
            if (substr($a, self::$start, self::$length) === substr($b, self::$start, self::$length)) {
                self::$counter++;
            }
        }
    }
    
    public static function getCounter()
    {
        return self::$counter;
    }
    
}

