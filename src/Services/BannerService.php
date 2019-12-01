<?php


namespace App\Services;


use App\Banner;
use App\Data\DataAccessInterface;

class BannerService
{
    /**
     * @var DataAccessInterface
     */
    private $dataAccess;

    public function __construct(DataAccessInterface $dataAccess)
    {
        $this->dataAccess = $dataAccess;
    }

    /**
     * @return Banner[]|array
     */
    public function getAllBanners()
    {
        return $this->dataAccess->getAll();
    }

    /**
     * @return Banner[]|array
     */
    public function getExpiredAds()
    {
        $allBanners = $this->getAllBanners();

        return array_filter($allBanners, function ($banner) {
            if ($banner->isExpired()) {
                return $banner;
            }
        });
    }

    /**
     * @param string $timezone
     * @return mixed
     */
    public function getActiveBanner(string $timezone = 'UTC')
    {
        if (UserIpAddressService::isQA()) {
            return $this->getQABanners($timezone);
        }

        $allBanners = $this->getAllBanners();

        $allActiveBanners = array_filter($allBanners, function ($banner) use ($timezone) {
            if ($banner->isActive($timezone)) {
                return $banner;
            }
        });

        return array_pop($allActiveBanners);
    }

    private function getQABanners(string $timezone = 'UTC')
    {
        $allBanners = $this->getAllBanners();

        $allActiveBanners = array_filter($allBanners, function ($banner) use ($timezone) {
            if ($banner->isActive($timezone) || $banner->isFuture($timezone)) {
                return $banner;
            }
        });

        usort($allActiveBanners, function ($bannerA, $bannerB) {
            return new \DateTime($bannerA->getEndDate()) <=> new \DateTime($bannerB->getEndDate());
        });

        return $allActiveBanners;
    }
}