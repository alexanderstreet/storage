<?php

namespace Chemisus\Storage\Decorations;

use Chemisus\Serialization\PHPSerializer;
use Chemisus\Storage\StorageDecorationTest;

class CompositeTest extends StorageDecorationTest
{
    public function factory()
    {
        return new Composite(array(
            new TTL(),
            new Serialize(new PHPSerializer())
        ));
    }

    public function testConstruct()
    {
        $decorations = array(
            new TTL(),
            new Serialize(new PHPSerializer())
        );

        $decoration = new Composite($decorations);

        self::assertEquals($decorations, $decoration->decorations());
    }
}