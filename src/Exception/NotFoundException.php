<?php

namespace Immortal\Container\Exception;

use Immortal\Exception\ExceptionHandler;
use Psr\Container\NotFoundExceptionInterface as PsrNotFoundException;

class NotFoundException extends ExceptionHandler implements PsrNotFoundException
{
}
