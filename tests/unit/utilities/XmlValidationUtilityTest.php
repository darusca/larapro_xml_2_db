<?php

namespace Tests\Unit;

use Tests\TestCase;

class XmlValidationUtilityTest extends \PHPUnit_Framework_TestCase
{
    public function testGet_GivenConfigXmlFilePath_returnsTrue()
    {
        $xmlFile = __DIR__ . '/config.xml';
        dd($xmlFile);
        $xmlData = fopen($xmlFile, 'r');
        $this->assertEquals(1, count($xmlData));
    }
}
