<?php


namespace App\Data;


interface DataAccessInterface
{
    /**
     * @return array
     */
    public function getAll() : array;

    /**
     * @param int $id
     * @return array
     */
    public function getOne(int $id) : array ;
}