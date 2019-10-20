<?php
namespace Classes;

class Validator
{
    private static $error = false;
    private static $last_message = ''; 
    
    public static function validateParameter($param)
    {
        if (!is_numeric($param)) {
            self::$error = true;
            self::$last_message = 'Parameters must be numeric';
        }
    }
    
    public static function error()
    {
        return self::$error;
    }
    
    public static function getErrorMessage()
    {
        return self::$last_message;
    }
}

