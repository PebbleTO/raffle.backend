<?php

namespace Kinncj\Bundle\AppBundle\Service;

use Doctrine\Common\Cache\CacheProvider;
use DMS\Service\Meetup\AbstractMeetupClient;

class MeetupService
{
    /** @var CacheProvider */
    private $cacheProvider;

    /** @var AbstractMeetupClient */
    private $meetupService;

    /**
     * @param CacheProvider        $cacheProvider
     * @param AbstractMeetupClient $meetupService
     */
    public function __construct(CacheProvider $cacheProvider, AbstractMeetupClient $meetupService)
    {
        $this->cacheProvider = $cacheProvider;
        $this->meetupService = $meetupService;
    }

    /**
     * @param string $method
     * @param array  $args
     *
     * @return mixed|void
     *
     */
    public function __call($method, $args)
    {
        $key = sha1(serialize($method).serialize($args));

        if($this->cacheProvider->contains($key)) {
            return $this->cacheProvider->fetch($key);
        }

        $data = $this->meetupService->__call($method, $args);

        //Cache for 30 minutes
        $this->cacheProvider->save($key, $data, 1800);

        return $data;
    }
}
