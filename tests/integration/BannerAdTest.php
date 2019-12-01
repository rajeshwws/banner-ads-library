<?php

namespace integration;


use App\Banner;
use App\BannerAd;
use PHPUnit\Framework\TestCase;

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

        $this->assertInstanceOf(Banner::class, $activeBanners[0]);
    }

}
