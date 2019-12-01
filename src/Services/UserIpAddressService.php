<?php


namespace App\Services;


class UserIpAddressService
{
    /** @var array */
    private static $validQAIp = [
        '10.0.0.10',
        '10.0.0.11'
    ];

    /**
     * @return mixed
     */
    public static function get()
    {
        return $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    /**
     * @return bool
     */
    public static function isQA() : bool
    {
        if (in_array(self::get(), self::$validQAIp)) {
            return true;
        }

        return false;
    }

}