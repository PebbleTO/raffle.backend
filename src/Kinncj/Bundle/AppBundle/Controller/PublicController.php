<?php

namespace Kinncj\Bundle\AppBundle\Controller;

use Kinncj\Bundle\AppBundle\DTO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class PublicController extends Controller
{
    /**
     * @Route("/public/api/events/today", name="public_api_event_today")
     */
    public function todayAction()
    {
        $meetupService = $this->get('app.service.meetup');
        $meetupData    = $meetupService->getEvents([
            'group_id'    => DTO\Group::GROUP_ID,
            'text_format' => 'plain'
        ])->getData()[0];

        $meetupData['rsvps'] = $meetupService->getRSVPs([
            'event_id'    => $meetupData['id'],
            'text_format' => 'plain'
        ])->getData();

        return new JsonResponse(DTO\Event::fromArray($meetupData), 200);
    }

    /**
     * @Route("/public/api/events/future", name="public_api_event_future")
     */
    public function futureAction()
    {
        $meetupService = $this->get('app.service.meetup');
        $meetups       = [];
        $meetupData    = $meetupService->getEvents([
            'group_id'    => DTO\Group::GROUP_ID,
            'text_format' => 'plain',
            'status'      => 'proposed'
        ])->getData();

        foreach ($meetupData as $meetup) {
            $meetup['rsvps'] = $meetupService->getRSVPs([
                'event_id'    => $meetup['id'],
                'text_format' => 'plain'
            ])->getData();;

            $meetups[] = DTO\Event::fromArray($meetup);
        }

        return new JsonResponse($meetups, 200);
    }
}
