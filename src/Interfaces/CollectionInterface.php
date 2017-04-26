<?php

namespace Immortal\Interfaces;

interface CollectionInterface extends \ArrayAccess, \Countable, \IteratorAggregate
{
    public function has($key);

    public function get($key, $default = null);

    public function set($key, $value);

    public function remove($key);

    public function replace(array $items);

    public function keys();

    public function all();

    public function clear();
}
