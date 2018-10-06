<?php

namespace Chemisus\Serialization;

class JsonSerializerTest extends SerializerTest
{
    public function serialize($value)
    {
        return json_encode($value);
    }

    public function testConstruct()
    {
        $serializer = new JsonSerializer();
        return $serializer;
    }
}
