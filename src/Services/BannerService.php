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
     * @return mixed
     */
    public function getActiveBanner()
    {
        if (UserIpAddressService::isQA()) {
            return $this->getQABanners();
        }

        $allBanners = $this->getAllBanners();

        $allActiveBanners = array_filter($allBanners, function ($banner) {
            if ($banner->isActive()) {
                return $banner;
            }
        });

        return array_pop($allActiveBanners);
    }

    private function getQABanners()
    {
        $allBanners = $this->getAllBanners();

        $allActiveBanners = array_filter($allBanners, function ($banner) {
            if ($banner->isActive() || $banner->isFuture()) {
                return $banner;
            }
        });

        usort($allActiveBanners, function ($bannerA, $bannerB) {
            return new \DateTime($bannerA->getEndDate()) <=> new \DateTime($bannerB->getEndDate());
        });

        return $allActiveBanners;
    }
}