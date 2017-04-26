<?php

namespace Immortal;

use Immortal\Interfaces\CollectionInterface;

class Collection implements CollectionInterface
{
    protected $data = [];

    public function __construct(array $items = [])
    {
        $this->replace($items);
    }

    #------------------------------------------------------------------------
    # Collection interface
    #------------------------------------------------------------------------

    public function has($key): bool
    {
        return array_key_exists($key, $this->data);
    }

    public function get($key, $default = null)
    {
        return $this->has($key) ? $this->data[$key] : $default;
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function remove($key)
    {
        unset($this->data[$key]);
    }

    public function replace(array $items)
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function keys()
    {
        return array_keys($this->data);
    }

    public function all()
    {
        return $this->data;
    }

    public function clear()
    {
        $this->data = [];
    }

    #------------------------------------------------------------------------
    # ArrayAccess interface
    #------------------------------------------------------------------------

    public function offsetExists($key): bool
    {
        return $this->has($key);
    }

    public function offsetGet($key)
    {
        return $this->get($key);
    }

    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    public function offsetUnset($key)
    {
        $this->remove($key);
    }

    #------------------------------------------------------------------------
    # Countable Interface
    #------------------------------------------------------------------------

    public function count(): int
    {
        return count($this->data);
    }

    #------------------------------------------------------------------------
    # IteratorAggregate interface
    #------------------------------------------------------------------------

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->data);
    }
}
