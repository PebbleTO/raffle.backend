<?php

namespace Kinncj\SecurityBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    /**
     * TODO: uncomment tests after vendor Lexik accepts PR https://github.com/lexik/LexikJWTAuthenticationBundle/pull/51
     */
    public function testIndex()
    {
        /*$client = static::createClient();

        $crawler = $client->request('POST', '/api/login_check', array('_username' => 'admin', '_password' => 'admin'));

        $crawler = $client->request('GET', '/app/example');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue($crawler->filter('html:contains("Homepage")')->count() > 0);*/
    }
}
