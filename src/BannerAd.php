<?php


namespace App;


use App\Data\MockBannerData;
use App\Services\BannerService;

class BannerAd
{

    /**
     * @var BannerService
     */
    private $service;

    public function __construct()
    {
        $this->service = new BannerService(new MockBannerData());
    }

    /**
     * @return array
     */
    public function getAll() : array
    {
        return $this->service->getAllBanners();
    }

    /**
     * @return array
     */
    public function getAllExpired() : array
    {
        return $this->service->getExpiredAds();
    }

    /**
     * @param string $timezone
     * @return mixed
     */
    public function getActiveBanner(string $timezone = 'UTC')
    {
        return $this->service->getActiveBanner($timezone);
    }

}