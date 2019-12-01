<?php


use App\Data\MockBannerData;
use PHPUnit\Framework\TestCase;

class MockBannerDataTest extends TestCase
{

    public function testGet()
    {
        $data = new MockBannerData();
        $banner = $data->getOne(1);
        $this->assertEquals(1, $banner->getId());

    }

    public function testGetAll()
    {
        $data = new MockBannerData();
        $result = $data->getAll();
        $this->assertEquals(5, count($result));
    }
}
