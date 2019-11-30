<?php


namespace App;


use DateTime;
use Exception;

class Banner
{
    protected $id;
    protected $banner_img;
    protected $start_date;
    protected $end_date;

    public function __construct(array $options)
    {
        $this->id = $options['id'] ?? '';
        $this->banner_img = $options['banner_img'] ?? '';
        $this->start_date = DateTime::createFromFormat('Y-m-d H:i:s', $options['start_date']) ?? new DateTime('now');
        $this->end_date = DateTime::createFromFormat('Y-m-d H:i:s', $options['end_date']) ?? new DateTime('tomorrow');
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function isActive() : bool
    {
        $current_date = new DateTime('now');

        if ($this->start_date >= $current_date) {
            return false;
        }
        return $this->end_date >= $current_date;
    }

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getBannerImg()
    {
        return $this->banner_img;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->start_date->format('Y-m-d H:i:s');
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->end_date->format('Y-m-d H:i:s');
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function isExpired() : bool
    {
        return !$this->isActive();
    }

}