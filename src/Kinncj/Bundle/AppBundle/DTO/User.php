<?php

namespace Kinncj\Bundle\AppBundle\DTO;

class User
{
    public $going;
    public $avatar;
    public $name;

    public static function fromArray(array $data)
    {
        $dto = new self();

        $dto->going = ($data['response'] === 'yes') ? true : false;
        $dto->name  = $data['member']['name'];

        if( ! empty($data['member_photo'])) {
            $dto->avatar = $data['member_photo']['photo_link'];
        }

        return $dto;
    }
}
