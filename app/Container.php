<?php

declare(strict_types=1);

namespace App;

use ArrayAccess;

class Container implements ArrayAccess
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var array
     */
    protected $cache = [];

    /**
     * Class constructor
     * @param array $items
     * @return void
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $key => $item) {
            $this->offsetSet($key, $item);
        }
    }

    /**
     * ArrayAccess: Set a given value to the given key.
     * @param string  $key
     * @param mixed  $value
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet(mixed $key, mixed $value): void
    {
        $this->items[$key] = $value;
    }

    /**
     * ArrayAccess: Gets the given key.
     * @param  mixed $key
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $key): mixed
    {
        if (!$this->has($key)) {
            return null;
        }

        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }

        $item = $this->items[$key]($this);

        $this->cache[$key] = $item;

        return $item;
    }

    /**
     * ArrayAccess: Unsets the given key.
     * @param mixed  $key
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset(mixed $key): void
    {
        if ($this->has($key)) {
            unset($this->items[$key]);
        }
    }

    /**
     * ArrayAccess: Check if a given key exists.
     * @param  mixed  $key
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists(mixed $key): bool
    {
        return $this->has($key);
    }

    /**
     * Checks if the container has the given key.
     * @param  string $key
     * @return boolean
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Magic method to allow object-type semantics for the container.
     * @param  string $key
     * @return mixed
     */
    public function __get(string $key): mixed
    {
        return $this->offsetGet($key);
    }
}
