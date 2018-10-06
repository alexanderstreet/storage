<?php

namespace Chemisus\Serialization;

class PHPSerializerTest extends SerializerTest
{
    public function serialize($value)
    {
        return serialize($value);
    }

    public function testConstruct()
    {
        $serializer = new PHPSerializer();
        return $serializer;
    }
}
