<?php

namespace Immortal\Component\Container;

use Immortal\Component\Container\Interfaces\ContainerInterface;

class Container implements ContainerInterface
{
    private $keys = [];
    private $lock = [];
    private $raw = [];
    private $values = [];

    public function __construct(array $values = [])
    {
        foreach ($values as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }

    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    public function __isset($name): bool
    {
        return $this->offsetExists($name);
    }

    public function __unset($name)
    {
        $this->offsetUnset($name);
    }

    public function __invoke(array $values)
    {
        $this->__construct($values);
    }

    #------------------------------------------------------------------------
    # ImmortalContainer interface
    #------------------------------------------------------------------------

    public function raw($key)
    {
        if (!isset($this->keys[$key])) {
            throw new \InvalidArgumentException(sprintf('Identifier "%s" is not defined.', $key));
        }
        if (isset($this->raw[$key])) {
            return $this->raw[$key];
        }

        return $this->values[$id];
    }

    public function keys()
    {
        return array_keys($this->values);
    }

    #------------------------------------------------------------------------
    # ArrayAccess interface
    #------------------------------------------------------------------------

    public function offsetExists($key): bool
    {
        return isset($this->keys[$key]);
    }

    public function offsetGet($key)
    {
        if (!isset($this->keys[$key])) {
            throw new \InvalidArgumentException(sprintf('Key "%s" is not defined.', $key));
        }

        if (isset($this->raw[$key]) || !is_object($this->values[$key])) {
            return $this->values[$key];
        }

        $this->lock[$key] = true;
        $this->raw[$key] = $this->values[$key];

        return $this->values[$key] = $this->raw[$key]($this);
    }

    public function offsetSet($key, $value)
    {
        if (isset($this->lock[$key])) {
            throw new \RuntimeException(sprintf('Cannot override locked service "%s".', $key));
        }

        $this->keys[$key] = true;
        $this->values[$key] = $value;
    }

    public function offsetUnset($key)
    {
        if (isset($this->keys[$key])) {
            unset($this->keys[$key], $this->lock[$key], $this->raw[$key], $this->values[$key]);
        }
    }
}
