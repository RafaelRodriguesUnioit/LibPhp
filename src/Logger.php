<?php 

namespace Minhalib;

class Logger
{
    public function log($message)
    {
        \Log::info($message);
    }
}
