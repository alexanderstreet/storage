<?php

namespace Chemisus\Storage\Decorations;

class AbstractStorageDecorationTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $decoration = new AbstractStorageDecoration();
        self::assertInstanceOf('Chemisus\\Storage\\Decorations\\AbstractStorageDecoration', $decoration);
    }

    public function testBeforeGet()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);
        $originalEntries = $entries;
        $originalKeys = $keys;

        $decoration = new AbstractStorageDecoration();
        $decoration->beforeGet($keys);

        self::assertEquals($originalEntries, $entries);
        self::assertEquals($originalKeys, $keys);
    }

    public function testAfterGet()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);
        $originalEntries = $entries;
        $originalKeys = $keys;

        $decoration = new AbstractStorageDecoration();
        $decoration->afterGet($keys, $entries);

        self::assertEquals($originalEntries, $entries);
        self::assertEquals($originalKeys, $keys);
    }

    public function testBeforePut()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);
        $originalEntries = $entries;
        $originalKeys = $keys;

        $decoration = new AbstractStorageDecoration();
        $decoration->beforePut($entries);

        self::assertEquals($originalEntries, $entries);
        self::assertEquals($originalKeys, $keys);

    }

    public function testAfterPut()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);
        $originalEntries = $entries;
        $originalKeys = $keys;

        $decoration = new AbstractStorageDecoration();
        $decoration->afterPut($entries);

        self::assertEquals($originalEntries, $entries);
        self::assertEquals($originalKeys, $keys);

    }

    public function testBeforeDelete()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);
        $originalEntries = $entries;
        $originalKeys = $keys;

        $decoration = new AbstractStorageDecoration();
        $decoration->beforeDelete($keys);

        self::assertEquals($originalEntries, $entries);
        self::assertEquals($originalKeys, $keys);

    }

    public function testAfterDelete()
    {
        $entries = array('a' => 'A', 'b' => 'B');
        $keys = array_keys($entries);
        $originalEntries = $entries;
        $originalKeys = $keys;

        $decoration = new AbstractStorageDecoration();
        $decoration->afterDelete($keys);

        self::assertEquals($originalEntries, $entries);
        self::assertEquals($originalKeys, $keys);

    }
}
