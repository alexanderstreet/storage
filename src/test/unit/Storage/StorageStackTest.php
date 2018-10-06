<?php

namespace Chemisus\Storage;

use Chemisus\Serialization\PHPSerializer;
use Chemisus\Storage\Decorations\Composite;
use Chemisus\Storage\Decorations\Serialize;
use Chemisus\Storage\Decorations\TTL;

class StorageStackTest extends StorageTest
{
    public function factory()
    {
        return new StorageStack(array(
            new ArrayStorage(),
            new StorageDecorator(
                new ArrayStorage(),
                new Composite(array(
                    new TTL(),
                    new Serialize(new PHPSerializer())
                ))
            )
        ));
    }

    public function testConstruct()
    {
        $stack = array(
            new ArrayStorage(),
            new ArrayStorage(),
        );

        $storage = new StorageStack($stack);

        self::assertEquals($stack, $storage->stack());
    }
}
