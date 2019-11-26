<?php


namespace App\Data;


use App\Banner;

class MockBannerData implements DataAccessInterface
{
    /** @var array  */
    private $data = [
        [
            'id' => 1,
            'banner_img' => 'http://some-image-1.jpg',
            'start_date' => '2019-11-12 00:00:00',
            'end_date' => '2019-11-17 12:00:00'
        ],
        [
            'id' => 2,
            'banner_img' => 'http://some-image-2.jpg',
            'start_date' => '2019-11-17 00:00:00',
            'end_date' => '2019-11-19 12:00:00'
        ],
        [
            'id' => 3,
            'banner_img' => 'http://some-image-3.jpg',
            'start_date' => '2019-11-20 00:00:00',
            'end_date' => '2019-11-22 12:00:00'
        ],
        [
            'id' => 4,
            'banner_img' => 'http://some-image-4.jpg',
            'start_date' => '2019-11-22 00:00:00',
            'end_date' => '2019-11-27 12:00:00'
        ]
    ];

    /**
     * @return array
     */
    public function getAll(): array
    {
        return array_map(function ($data) {
            return $this->factory($data);
        }, $this->data);
    }

    /**
     * @param int $id
     * @return Banner
     */
    public function getOne(int $id): Banner
    {
        if (!in_array($id, array_column($this->data, 'id'))) {
            return null;
        }

        $data =  array_filter($this->data, function ($data) use ($id) {
            if ($data['id'] === $id) {
                return $data;
            }
        })[0];

        return $this->factory($data);
    }

    /**
     * @param array $data
     * @return Banner
     */
    protected function factory(array $data) : Banner
    {
        return new Banner($data);
    }
}