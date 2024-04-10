<?php 

namespace Minhalib\Logs;

class Logger
{
    public function log($message)
    {
        \Log::info($message);
    }
}
