<?php

namespace Immortal\Container\Exception;

use Immortal\Exception\ExceptionHandler;
use Psr\Container\ContainerExceptionInterface as PsrContainerException;

class ContainerException extends ExceptionHandler implements PsrContainerException
{
}
