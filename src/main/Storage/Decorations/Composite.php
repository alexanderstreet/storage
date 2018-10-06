<?php

namespace Chemisus\Storage\Decorations;

use Chemisus\Storage\StorageDecoration;

class Composite extends AbstractStorageDecoration
{
    /**
     * @var StorageDecoration[]
     */
    private $decorations;

    /**
     * @param StorageDecoration[] $decorations
     */
    public function __construct(array $decorations)
    {
        $this->decorations = $decorations;
    }

    /**
     * @return StorageDecoration[]
     */
    public function decorations()
    {
        return $this->decorations;
    }

    /**
     * @return StorageDecoration[]
     */
    public function decorationsReversed()
    {
        return array_reverse($this->decorations());
    }

    public function beforeGet(array &$keys)
    {
        foreach ($this->decorationsReversed() as $decoration) {
            $decoration->beforeGet($keys);
        }
    }

    public function afterGet(array &$keys, array &$entries)
    {
        foreach ($this->decorationsReversed() as $decoration) {
            $decoration->afterGet($keys, $entries);
        }
    }

    public function beforePut(array &$entries)
    {
        foreach ($this->decorations() as $decoration) {
            $decoration->beforePut($entries);
        }
    }

    public function afterPut(array &$entries)
    {
        foreach ($this->decorations() as $decoration) {
            $decoration->afterPut($entries);
        }
    }

    public function beforeDelete(array &$keys)
    {
        foreach ($this->decorations() as $decoration) {
            $decoration->beforeDelete($keys);
        }
    }

    public function afterDelete(array &$keys)
    {
        foreach ($this->decorations() as $decoration) {
            $decoration->afterDelete($keys);
        }
    }
}
