<?php

namespace Chemisus\Storage\Decorations;

use Chemisus\Serialization\JsonSerializer;
use Chemisus\Storage\StorageDecorationTest;


class SerializerTest extends StorageDecorationTest
{
    public function factory()
    {
        return new Serialize(new JsonSerializer());
    }

    public function testConstruct()
    {
        $serializer = self::getMockBuilder('Chemisus\\Serialization\\Serializer')->getMock();
        $decoration = new Serialize($serializer);
        self::assertEquals($serializer, $decoration->serializer());
    }

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
        $serializer->expects(self::exactly(count($entries)))->method('deserialize');

        $decoration->afterGet($keys, $entries);
    }

    public function testBeforePut()
    {
        $entries = array('a' => 'A', 'b' => 'B');

        $serializer = self::getMockBuilder('Chemisus\\Serialization\\Serializer')->getMock();
        $decoration = new Serialize($serializer);

        $serializer->expects(self::exactly(count($entries)))->method('serialize')->withConsecutive(array('A'), array('B'));
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
