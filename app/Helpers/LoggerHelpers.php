<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class LoggerHelpers
{
    public static function log($message, $level = 'info')
    {
        // Basic logging functionality
        Log::channel('daily')->$level($message);
    }
    
    public static function logError($message, $context = [])
    {
        Log::error($message, $context);
    }
    
    public static function logInfo($message, $context = [])
    {
        Log::info($message, $context);
    }
    
    public static function logDebug($message, $context = [])
    {
        Log::debug($message, $context);
    }
}
