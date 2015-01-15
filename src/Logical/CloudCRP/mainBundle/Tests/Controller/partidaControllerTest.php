<?php

namespace Logical\CloudCRP\mainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class partidaControllerTest extends WebTestCase
{
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/partida/nueva');
    }

    public function testEditar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/partida/editar');
    }

    public function testMostrar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/partida/mostrar');
    }

}
