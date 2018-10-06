<?php

namespace Chemisus\Serialization;

class PHPSerializer implements Serializer
{
    public function serialize($value)
    {
        return serialize($value);
    }

    public function deserialize($string)
    {
        return unserialize($string);
    }
}
