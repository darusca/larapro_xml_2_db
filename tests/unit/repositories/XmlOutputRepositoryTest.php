<?php

namespace Tests\Unit;

use Tests\TestCase;
use Eon\Dario\XmlOutputRepository;
use Illuminate\Support\Facades\Artisan;

class XmlOutputRepoTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        \Mockery::close();
        Artisan::call('migrate:reset');
        Artisan::call('migrate');
        parent::tearDown();
    }

    public function testSave_XmlDataGiven_CreatesNewEntry()
    {
        $xmlOutputRepo = new XmlOutputRepository();
        $xmlData = array(
            'title' => 'Internet of things',
            'description' => 'Connected world',
            'launch_url' => 'launch.url.com',
            'icon_url' => 'icon.url.com'
        );

        $actual = $xmlOutputRepo->save($xmlData);
        $expected = $xmlData['title'];

        $this->assertEquals($expected, $actual);
    }
}
