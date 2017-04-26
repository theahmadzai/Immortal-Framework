<?php

namespace Immortal\Component\Container\Interfaces;

interface ContainerInterface extends \ArrayAccess
{
    public function raw($key);

    public function keys();
}
