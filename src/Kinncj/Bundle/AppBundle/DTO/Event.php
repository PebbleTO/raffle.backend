<?php

namespace Kinncj\Bundle\AppBundle\DTO;

class Event
{
    public $name;
    public $description;
    public $url;
    public $announced;
    public $created;
    public $updated;
    public $status;
    public $rsvps;

    public static function fromArray(array $data)
    {
        $dto = new self();

        $dto->name        = $data['name'];
        $dto->description = $data['description'];
        $dto->url         = $data['event_url'];
        $dto->announced   = $data['announced'];
        $dto->created     = (new \DateTime(strtotime($data['created'])))->format('Y-d-m H:i');
        $dto->updated     = (new \DateTime(strtotime($data['updated'])))->format('Y-d-m H:i');;
        $dto->status      = $data['status'];
        $dto->rsvps       = UserCollection::fromArray($data['rsvps']);

        return $dto;
    }
}
