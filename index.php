<?php

require 'vendor/autoload.php';

$bannerAd = new \App\BannerAd();

$allBanners = $bannerAd->getAll();

$allActiveBanners = $bannerAd->getActiveBanner();

$expiredAds = $bannerAd->getAllExpired();

print_r([
    'All Banners' => $allBanners,
    'All Active Banners' => $allActiveBanners,
    'All Expired Banners' => $expiredAds
]);