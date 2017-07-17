<?php

namespace Tests\Unit;

use Tests\TestCase;

class XmlValidationUtilityTest extends \PHPUnit_Framework_TestCase
{
    public function testGet_GivenConfigXmlFile_returnsSimpleXMLObject()
    {
        $xmlFile = __DIR__ . '/config.xml';

        $actual = simplexml_load_file($xmlFile);
        $expected = new \SimpleXMLElement($xmlFile, 0, $data_is_url = true);

        $this->assertEquals($expected, $actual);
    }
}
