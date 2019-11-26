<?php


use App\Data\MockBannerData;
use PHPUnit\Framework\TestCase;

class MockBannerDataTest extends TestCase
{

    public function testGet()
    {
        $data = new MockBannerData();
        $result = $data->getOne(1);
        $this->assertEquals(1, $result['id']);

    }

    public function testGetAll()
    {
        $data = new MockBannerData();
        $result = $data->getAll();
        $this->assertEquals(4, count($result));
    }
}
