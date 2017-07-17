<?php

namespace Eon\Dario;

class XmlValidationUtilityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Eon\Dario\XmlValidationUtility::getXml()
     */
    public function testGet_GivenConfigXmlFile_returnsSimpleXMLObject()
    {
        $xmlFile = __DIR__.'/config.xml';

        $actual = simplexml_load_file($xmlFile);
        $expected = new \SimpleXMLElement($xmlFile, 0, $data_is_url = true);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \Eon\Dario\XmlValidationUtility::getXml()
     * @covers \Eon\Dario\XmlValidationUtility::getXmlOutput()
     * @group exception
     * @expectedException \Exception
     * @expectedExceptionMessage String could not be parsed as XML
     */
    public function testGet_GivenInvalidConfigXmlFile_throwsException()
    {
        $invalidXmlFile = __DIR__.'/invalidConfig.xml';

        $xml = $this->getMockBuilder(XmlValidationUtility::class)
            ->disableOriginalConstructor()
            ->getMock();

        $xml->expects($this->any())
            ->method('getXmlOutput');

        new \SimpleXMLElement($invalidXmlFile, 0, $data_is_url = true);
    }
}
