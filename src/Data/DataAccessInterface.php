<?php


namespace App\Data;


use App\Banner;

interface DataAccessInterface
{
    /**
     * @return array
     */
    public function getAll() : array;

    /**
     * @param int $id
     * @return Banner
     */
    public function getOne(int $id) : Banner ;
}