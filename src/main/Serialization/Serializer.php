<?php

namespace Chemisus\Serialization;

interface Serializer
{
    /**
     * @param mixed $value
     * @return string
     */
    public function serialize($value);

    /**
     * @param string $string
     * @return mixed
     */
    public function deserialize($string);
}
