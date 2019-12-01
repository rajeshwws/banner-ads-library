<?php

namespace integration;


use App\Banner;
use App\BannerAd;
use PHPUnit\Framework\TestCase;

/**
 * Class BannerAdTest
 * @package integration
 * @covers \App\BannerAd
 * @covers \App\Services\BannerService
 * @covers \App\Banner
 * @covers \App\Data\MockBannerData
 * @covers \App\Services\UserIpAddressService
 */
class BannerAdTest extends TestCase
{

    public function testGetAllBannerAds()
    {
        $bannerAd = new BannerAd();

        $allBannerAds = $bannerAd->getAll();

        $this->assertEquals(6, count($allBannerAds));
    }

    public function testGetAllExpiredAds()
    {
        $bannerAd = new BannerAd();

        $expiredAds = $bannerAd->getAllExpired();

        $this->assertEquals(4, count($expiredAds));
    }

    public function testGetActiveBanner()
    {
        unset($_SERVER['REMOTE_ADDR']);

        $bannerAd = new BannerAd();

        $activeBanner = $bannerAd->getActiveBanner();

        $this->assertInstanceOf(Banner::class, $activeBanner);
    }

    public function testQAGetActiveBanners()
    {
        $_SERVER['REMOTE_ADDR'] = '10.0.0.10';

        $bannerAd = new BannerAd();

        $activeBanners = $bannerAd->getActiveBanner();

        $this->assertEquals(2, count($activeBanners));

        $this->assertInstanceOf(Banner::class, $activeBanners[0]);
    }

    public function testTimeZoneIntegration()
    {
        unset($_SERVER['REMOTE_ADDR']);

        $bannerAd = new BannerAd();

        $activeBanner = $bannerAd->getActiveBanner('JST');

        $this->assertInstanceOf(Banner::class, $activeBanner);
    }

}
