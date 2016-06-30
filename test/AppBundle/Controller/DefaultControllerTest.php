<?php

namespace Test\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * DefaultControllerTest
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * Проверяет корректное отображение главной страницы
     *
     * @return void
     *
     * @see \AppBundle\Controller\DefaultController::indexAction
     */
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        static::assertEquals(200, $client->getResponse()->getStatusCode());
        static::assertContains('Welcome', $crawler->filter('.container h1')->text());
    }
}
