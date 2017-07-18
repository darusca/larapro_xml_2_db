<?php

namespace Tests\Unit;

use Tests\TestCase;

class XmlOutputControllerTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        \Mockery::close();
        parent::tearDown();
    }

    public function testReceive_GivenUrl_ResponseStatusOk()
    {
        $response = $this->call('GET', 'receive');
        $this->assertEquals(200, $response->status());
    }
}
