<?php

namespace Chemisus\Storage\Decorations;

use PHPUnit_Framework_TestCase;

class SerializerTest extends PHPUnit_Framework_TestCase
{
    public function testBeforeGet()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);

        $serializer = self::getMockBuilder('Chemisus\\Serialization\\Serializer')->getMock();
        $decoration = new Serialize($serializer);

        $serializer->expects(self::never())->method('serialize');
        $serializer->expects(self::never())->method('deserialize');

        $decoration->beforeGet($keys);
    }

    public function testAfterGet()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);

        $serializer = self::getMockBuilder('Chemisus\\Serialization\\Serializer')->getMock();
        $decoration = new Serialize($serializer);

        $serializer->expects(self::never())->method('serialize');
        $serializer->expects(self::at(0))->method('deserialize')->with('A');
        $serializer->expects(self::at(1))->method('deserialize')->with('B');

        $decoration->afterGet($keys, $entries);
    }

    public function testBeforePut()
    {
        $entries = array('a' => 'A', 'b' => 'B');

        $serializer = self::getMockBuilder('Chemisus\\Serialization\\Serializer')->getMock();
        $decoration = new Serialize($serializer);

        $serializer->expects(self::at(0))->method('serialize')->with('A');
        $serializer->expects(self::at(1))->method('serialize')->with('B');
        $serializer->expects(self::never())->method('deserialize');

        $decoration->beforePut($entries);
    }

    public function testAfterPut()
    {
        $entries = array('a' => 'A', 'b' => 'B');

        $serializer = self::getMockBuilder('Chemisus\\Serialization\\Serializer')->getMock();
        $decoration = new Serialize($serializer);

        $serializer->expects(self::never())->method('serialize');
        $serializer->expects(self::never())->method('deserialize');

        $decoration->afterPut($entries);
    }

    public function testBeforeDelete()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);

        $serializer = self::getMockBuilder('Chemisus\\Serialization\\Serializer')->getMock();
        $decoration = new Serialize($serializer);

        $serializer->expects(self::never())->method('serialize');
        $serializer->expects(self::never())->method('deserialize');

        $decoration->beforeDelete($keys);
    }

    public function testAfterDelete()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);

        $serializer = self::getMockBuilder('Chemisus\\Serialization\\Serializer')->getMock();
        $decoration = new Serialize($serializer);

        $serializer->expects(self::never())->method('serialize');
        $serializer->expects(self::never())->method('deserialize');

        $decoration->afterDelete($keys);
    }
}
