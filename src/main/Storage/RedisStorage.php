<?php

namespace Chemisus\Storage;

use Redis;

class RedisStorage implements Storage
{
    /**
     * @var Redis
     */
    private $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function get(array $keys)
    {
        return array_filter(
            $this->redis->mget($keys),
            function ($value) {
                return $value !== false;
            }
        );
    }

    public function put(array $entries)
    {
        $this->redis->mset($entries);
    }

    public function delete(array $keys)
    {
        $this->redis->delete($keys);
    }
}
