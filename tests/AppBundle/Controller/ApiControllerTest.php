<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
require('vendor/autoload.php');

class ApiControllerTest extends WebTestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'http://localhost:8000'
        ]);
    }

    public function testGetUser()
    {
        $response = $this->client->get('/api/user');
        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
        
        $data = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('name', $data[0]);
        $this->assertArrayHasKey('username', $data[0]);
        $this->assertArrayHasKey('roles', $data[0]);      
    }

}


