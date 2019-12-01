<?php


use App\Data\MockBannerData;
use PHPUnit\Framework\TestCase;

/**
 * Class MockBannerDataTest
 * @covers App\Data\MockBannerData
 * @covers \App\Banner
 * @uses \App\Data\MockBannerData
 */
class MockBannerDataTest extends TestCase
{

    public function testGet()
    {
        $data = new MockBannerData();
        $banner = $data->getOne(1);
        $this->assertEquals(1, $banner->getId());
    }

    public function testGetNewBanner()
    {
        $this->expectException(TypeError::class);
        $data = new MockBannerData();
        $banner = $data->getOne(-1);
    }

    public function testGetAll()
    {
        $data = new MockBannerData();
        $result = $data->getAll();
        $this->assertEquals(6, count($result));
    }
}
