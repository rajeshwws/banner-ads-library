<?php


use App\Banner;
use PHPUnit\Framework\TestCase;

class BannerTest extends TestCase
{
    protected $banner;

    protected function setUp(): void
    {
        $this->banner = new Banner([
            'id' => 4,
            'banner_img' => 'http://some-image-4.jpg',
            'start_date' => '2019-11-22 00:00:00',
            'end_date' => '2019-11-26 12:00:00'
        ]);

        parent::setUp();
    }

    public function testGetBannerImg()
    {
        $this->assertEquals('http://some-image-4.jpg', $this->banner->getBannerImg());
    }

    public function testGetId()
    {
        $this->assertEquals(4, $this->banner->getId());
    }

    public function testGetStartDate()
    {
        $this->assertEquals('2019-11-22 00:00:00', $this->banner->getStartDate());
    }

    public function testGetEndDate()
    {
        $this->assertEquals('2019-11-26 12:00:00', $this->banner->getEndDate());
    }

    public function testIsActive()
    {
        $this->assertFalse($this->banner->isActive());
    }

    public function testIsExpired()
    {
        $this->assertTrue($this->banner->isExpired());
    }
}
