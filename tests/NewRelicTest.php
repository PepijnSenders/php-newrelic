<?php

use Pep\NewRelic;

class NewRelicTest extends PHPUnit_Framework_TestCase
{

    public function testExtensionLoaded()
    {
        return extension_loaded('newrelic');
    }

    /**
     * @depends testExtensionLoaded
     */
    public function testExistingNewRelicMethodCall($isExtensionLoaded)
    {
        if ($isExtensionLoaded) {
            NewRelic::noticeError('test');
        } else {
            NewRelic::$extensionLoaded = true;

            $this->setExpectedException('Pep\NewRelic\MethodNotFoundException');

            NewRelic::noticeError('test');
        }
    }

    public function testNonExistingNewRelicMethodCall()
    {
        $this->setExpectedException('Pep\NewRelic\MethodNotFoundException');

        NewRelic::test('test');
    }
}
