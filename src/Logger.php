<?php 

namespace Minhalib;

class Logger
{
    public static function log($message)
    {
        \Log::info($message);
    }
}
