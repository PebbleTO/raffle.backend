<?php

namespace Kinncj\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExampleController extends Controller
{
    /**
     * @Route("/api/example", name="example_api")
     */
    public function indexAction()
    {
        return new Response(
            json_encode(
                array(
                    "hello" => "world"

                )
            ),
            200,
            array(
                "Content-Type" => "application/json"

            )
        );
    }

    /**
     * @Route("/example", name="example")
     */
    public function exampleAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }
}
