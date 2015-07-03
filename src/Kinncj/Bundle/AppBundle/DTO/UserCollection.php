<?php

namespace Kinncj\Bundle\AppBundle\DTO;

use Doctrine\Common\Collections\ArrayCollection;

class UserCollection extends ArrayCollection implements \JsonSerializable
{
    public function add($value)
    {
        $this->validate($value);

        return parent::add($value);
    }

    public function set($key, $value)
    {
        $this->validate($value);

        return parent::set($key, $value);
    }

    private function validate($value)
    {
        if (!$value instanceof User) {
            $message = 'Argument type must be "Kinncj\Bundle\AppBundle\DTO\User", "%s" given';

            throw new \InvalidArgumentException($message, (is_object($value) ? get_class($value) : gettype($value)));
        }
    }

    public function JsonSerialize()
    {
        return $this->toArray();
    }

    public static function fromArray(array $data)
    {
        $dto = new self();

        foreach($data as $user) {
            $dto[] = User::fromArray($user);
        }

        return $dto;
    }
}
