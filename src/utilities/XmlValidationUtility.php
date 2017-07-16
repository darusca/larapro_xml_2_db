<?php

namespace Eon\Dario;

class XmlValidationUtility
{
    private static $xmlFilePath = __DIR__ . '/../../config.xml';
    private static $xmlOutput = [];

    /**
     * @return array
     */
    public static function getXmlOutput()
    {
        $xml = simplexml_load_file(self::$xmlFilePath);

        $titles = $xml->xpath('//blti:title/text()');
        foreach ($titles as $title) {
            self::$xmlOutput['Title'] = $title;
        }

        $descriptions = $xml->xpath('//blti:description/text()');
        foreach ($descriptions as $description) {
            self::$xmlOutput['Description'] = $description;
        }

        $launchUrls = $xml->xpath('//blti:launch_url/text()');
        foreach ($launchUrls as $launchUrl) {
            self::$xmlOutput['Launch Url'] = $launchUrl;
        }

        $iconUrls = $xml->xpath('//blti:extensions/lticm:property[2]/text()');
        foreach ($iconUrls as $iconUrl) {
            self::$xmlOutput['Icon Url'] = $iconUrl;
        }

        return self::$xmlOutput;
    }

    /**
     * @return string
     */
    public static function getXmlFilePathBaseName()
    {
        return basename(self::$xmlFilePath);
    }
}
