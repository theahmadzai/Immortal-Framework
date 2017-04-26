<?php

namespace Immortal\Interfaces;

use Psr\Container\ContainerInterface as PsrContainerInterface;

interface ContainerInterface extends PsrContainerInterface
{
    public function registerServices();
}
