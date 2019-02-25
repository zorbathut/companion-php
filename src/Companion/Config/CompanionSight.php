<?php

namespace Companion\Config;

/**
 * Companion Sight API Configuration
 */
class CompanionSight
{
    // defaults
    private static $defaults = [
        'CLIENT_TIMEOUT'    => 30,
        'CLIENT_VERIFY'     => false,
        'QUERY_LOOPED'      => true,
        'QUERY_LOOP_COUNT'  => 5,
        'QUERY_DELAY_MS'    => 800 * 1000,
        'TOKEN_EXPIRY_HRS'  => 18,
    ];

    // custom
    private static $settings = [];
    
    /**
     * Set an option
     */
    public static function set($option, $value)
    {
        // multiply any query delays in milliseconds by 1000
        $value = $option === 'QUERY_DELAY_MS' ? ($value * 1000) : $value;
        
        self::$settings[$option] = $value;
    }
    
    /**
     * Get an option (or return default)
     */
    public static function get($option)
    {
        return self::$settings[$option] ?? (self::$defaults[$option] ?? false);
    }
}