<?php

namespace unit;

use App\Services\UserIpAddressService;
use PHPUnit\Framework\TestCase;

class UserIpAddressTest extends TestCase
{

    public function testGet()
    {
        $_SERVER['REMOTE_ADDR'] = '192.168.21.35';
        $this->assertEquals($_SERVER['REMOTE_ADDR'], UserIpAddressService::get());
    }

    public function testIsQA()
    {
        $_SERVER['REMOTE_ADDR'] = '192.168.21.35';
        $this->assertFalse(UserIpAddressService::isQA());
    }
}
