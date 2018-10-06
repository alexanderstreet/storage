<?php

namespace Chemisus\Serialization;

use PHPUnit_Framework_TestCase;

abstract class SerializerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param mixed $value
     * @return string
     */
    public abstract function serialize($value);

    public function data()
    {
        return array(
            array(null),
            array(0),
            array(1),
            array(-1),
            array(""),
            array("a"),
            array(array()),
            array((object)array()),
        );
    }

    /**
     * @return Serializer
     */
    public abstract function testConstruct();

    /**
     * @param mixed $value
     * @param Serializer $serializer
     * @depends      testConstruct
     * @dataProvider data
     */
    public function testSerialize($value, Serializer $serializer)
    {
        $string = $this->serialize($value);
        $expect = $string;
        $actual = $serializer->serialize($value);
        self::assertEquals($expect, $actual);
    }

    /**
     * @param mixed $value
     * @param Serializer $serializer
     * @depends      testConstruct
     * @dataProvider data
     */
    public function testDeserialize($value, Serializer $serializer)
    {
        $string = $this->serialize($value);
        $expect = $value;
        $actual = $serializer->deserialize($string);
        self::assertEquals($expect, $actual);
    }
}
