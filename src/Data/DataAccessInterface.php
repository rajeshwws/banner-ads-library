<?php


namespace App\Data;


use App\Banner;

interface DataAccessInterface
{
    /**
     * @return Banner []
     */
    public function getAll() : array;

    /**
     * @param int $id
     * @return Banner
     */
    public function getOne(int $id) : Banner ;
}